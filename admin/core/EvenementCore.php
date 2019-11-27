<?php
require_once '../../../config/Config.php';
class EvenementCore
{
    public $db;

    public function __construct() {
        $this->db=Config::getConnexion();
    }

    public function ajouter($event)
    {
        $sql="INSERT INTO evenement (nom,descp,image,dated,datef,lieu,nb_place,prix) VALUES(:nom,:descp,:image,:dated,:datef,:lieu,:nb_place,:prix) ";
        try{
            $dd=date("Y-m-d", strtotime($event->dated));
            $df=date("Y-m-d", strtotime($event->dated));
            $req=$this->db->prepare($sql);
            $req->bindParam(":nom",$event->nom,PDO::PARAM_STR);
            $req->bindParam(":descp",$event->descp,PDO::PARAM_STR);
            $req->bindParam(":image",$event->image,PDO::PARAM_STR);
            $req->bindParam(":dated",$dd,PDO::PARAM_STR);
            $req->bindParam(":datef",$df,PDO::PARAM_STR);
            $req->bindParam(":lieu",$event->lieu,PDO::PARAM_STR);
            $req->bindParam(":nb_place",$event->nb_place,PDO::PARAM_INT);
            $req->bindParam(":prix",$event->prix,PDO::PARAM_INT);
            $req->execute();

        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }
    public function modifier($event)
    {
        $sql="UPDATE evenement set nom=:nom,descp=:descp,image=:image,dated=:dated,datef=:datef,lieu=:lieu,nb_place=:nb_place,prix=:prix WHERE id=:id";
        try{
            $req=$this->db->prepare($sql);
            $req->bindParam(":nom",$event->nom,PDO::PARAM_STR);
            $req->bindParam(":descp",$event->descp,PDO::PARAM_STR);
            $req->bindParam(":image",$event->image,PDO::PARAM_STR);
            $req->bindParam(":dated",$event->dated,PDO::PARAM_STR);
            $req->bindParam(":datef",$event->datef,PDO::PARAM_STR);
            $req->bindParam(":lieu",$event->lieu,PDO::PARAM_STR);
            $req->bindParam(":nb_place",$event->nb_place,PDO::PARAM_INT);
            $req->bindParam(":prix",$event->prix,PDO::PARAM_INT);
            $req->bindParam(":id",$event->id,PDO::PARAM_INT);
            $req->execute();
        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }

    public function supprimer($id)
    {
        $sql="DELETE FROM evenement  WHERE id=:id";
        try{
            $req=$this->db->prepare($sql);
            $req->bindParam(":id",$id,PDO::PARAM_INT);
            $req->execute();
        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
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
    public function getAllAvecNb()
    {
        $sql="SELECT e.* , SUM(p.nb_place) nbp FROM participer p left join evenement e on p.event_id=e.id group by (e.id) ";
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


}
