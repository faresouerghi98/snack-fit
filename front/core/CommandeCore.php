<?php
require_once '../../config/Config.php';
class CommandeCore
{
    public $db;

    public function __construct() {
        $this->db=Config::getConnexion();
    }

    public function getAllByID($id_client)
    {
        $sql="SELECT * FROM commande where id_client=:id_client ";
        try{
            $req=$this->db->prepare($sql);
            $req->bindParam(":id_client",$id_client,PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_OBJ);

        }catch(Execption $e){
            die("Erreur : " .$e->getMessage());
        }
    }


}
