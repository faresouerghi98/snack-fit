<?php
require_once '../../config/Config.php';
class EvenementCore
{
    public $db;

    public function __construct() {
        $this->db=Config::getConnexion();
    }

    public function getAll()
    {
        $sql="SELECT * FROM evenement ";
        try{
            $req=$this->db->prepare($sql);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_OBJ);

        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }
    public function findById($id)
    {
        $sql="SELECT * FROM evenement WHERE id=:id ";
        try{
            $req=$this->db->prepare($sql);
            $req->bindParam(":id",$id,PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_OBJ);

        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }

    public function participer($event_id,$user_id , $nb)
    {
        $sql="INSERT INTO participer  VALUES ()";
    }
    public function getParticipation($user_id,$event_id)
    {
        $sql="SELECT * FROM participer WHERE user_id=:user_id AND event_id=:event_id ";
        try{
            $req=$this->db->prepare($sql);
            $req->bindParam(":user_id",$user_id,PDO::PARAM_INT);
            $req->bindParam(":event_id",$event_id,PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_OBJ);

        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }



}
