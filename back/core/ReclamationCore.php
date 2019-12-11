<?php

require_once '../../config/Config.php';

class ReclamationCore
{
    public $db;

    public function __construct() {
        $this->db=Config::getConnexion();
    }


    public function traiter($id,$descp){

        //$descp="--- " . $descp;
      //  var_dump($descp);die;
        $sql="UPDATE reclamation SET etat='traiter',descp = :descp WHERE id=:id";
       	$req=$this->db->prepare($sql);
        $req->bindValue(":id",$id);
        $req->bindValue(":descp",$descp);
       	$req->execute();

    }
    public function rejeter(Type $var = null)
    {
        $sql="UPDATE reclamation SET etat='rejeter' WHERE id=:id";
       	$req=$this->db->prepare($sql);
        $req->bindValue(":id",$rec->getId());
       	$req->execute();
    }
    public function findAllTraiter(){
        $sql="SELECT r.*,u.username,c.Qty,c.Prix FROM reclamation r
              INNER JOIN user u ON u.id=r.user_id
              INNER JOIN commande c ON c.id_commande=r.cmd_id
              WHERE r.etat ='traiter' ";
        try{
            $req=$this->db->prepare($sql);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_OBJ);

        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }
    public function findAllEnAttente(){
        $sql="SELECT r.*,u.username,c.Qty,c.Prix FROM reclamation r
              INNER JOIN user u ON u.id=r.user_id
              INNER JOIN commande c ON c.id_commande=r.cmd_id
              WHERE r.etat ='en attente' ";
        try{
            $req=$this->db->prepare($sql);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_OBJ);

        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }
    public function findByUser($user_id){
        $sql="SELECT * FROM reclamation WHERE user_id=:user_id";
        try{
            $req=$this->db->prepare($sql);
            $req->bindParam(":user_id",$user_id,PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_OBJ);

        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }
    public function findById($id){
        $sql="SELECT r.*,u.username,c.Qty,c.Prix FROM reclamation r
              INNER JOIN user u ON u.id=r.user_id
              INNER JOIN commande c ON c.id_commande=r.cmd_id
              WHERE r.id=:id AND r.etat ='en attente' ";
        try{
            $req=$this->db->prepare($sql);
            $req->bindParam(":id",$id,PDO::PARAM_INT);
            $req->execute();
            return $req->fetch(PDO::FETCH_OBJ);
        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }
    public function verifier($user_id,$cmd_id){
        $sql="SELECT * FROM reclamation WHERE user_id=:user_id AND cmd_id=:cmd_id";
        try{
            $req=$this->db->prepare($sql);
            $req->bindParam(":user_id",$user_id,PDO::PARAM_INT);
            $req->bindParam(":cmd_id",$cmd_id,PDO::PARAM_INT);
            $req->execute();
            return $req->fetch(PDO::FETCH_OBJ);
        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }
    public function supprimer($id)
    {
        $sql="DELETE FROM reclamation WHERE id=:id ";
        try{
            $req=$this->db->prepare($sql);
            $req->bindParam(":id",$id,PDO::PARAM_INT);
            $req->execute();

        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }


}
