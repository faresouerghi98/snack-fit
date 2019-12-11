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
            return $req->fetch(PDO::FETCH_OBJ);

        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }

    public function participer($user_id,$event_id,$nb)
    {
      $sql2="UPDATE evenement set nb_place=nb_place - :nb_place WHERE id=:id";
      try{
          $req2=$this->db->prepare($sql2);

          $req2->bindParam(":id",$event_id,PDO::PARAM_INT);
          $req2->bindParam(":nb_place",$nb,PDO::PARAM_INT);
          $req2->execute();

      }catch(Execption $e){
          die("Erreur : " .$e->getMessage());
      }
        $sql="INSERT INTO participer (user_id,event_id,nb_place,etat) VALUES (:user_id,:event_id,:nb_place,'non payee')";
        try{
            $req=$this->db->prepare($sql);
            $req->bindParam(":user_id",$user_id,PDO::PARAM_INT);
            $req->bindParam(":event_id",$event_id,PDO::PARAM_INT);
            $req->bindParam(":nb_place",$nb,PDO::PARAM_INT);
            $req->execute();


        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }

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

    public function dejaParti($user_id)
    {
      $sql="SELECT * FROM participer WHERE user_id=:user_id ";
      try{
          $req=$this->db->prepare($sql);
          $req->bindParam(":user_id",$user_id,PDO::PARAM_INT);

          $req->execute();
          return $req->fetchAll(PDO::FETCH_OBJ);

      }catch(Execption $e){
          die("Erreur : " .$e->getMessage());
      }
    }



}
