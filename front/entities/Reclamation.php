<?php
class Reclamation
{
    public $id;
    public $user_id;
    public $cmd_id;
    public $date_rec;
    public $motif;
    public $descp;
    public $etat;


    public function __construct($id,$user_id,$cmd_id,$motif,$descp) {
        $this->id=$id;
        $this->user_id=$user_id;
        $this->cmd_id=$cmd_id;
        $this->motif=$motif;
        $this->descp=$descp;
    }
    /*
    public function getId(){
        return $this->id;
    }
    public function getUserID(){
        return $this->user_id;
    }
    public function getCmdId(){
        return $this->cmd_id;
    }
    public function getDateRec(){
        return $this->date_rec;
    }
    public function getDescp(){
        return $this->descp;
    }
    public function getEtat(){
        return $this->etat;
    }


    public function setId($id){
        $this->id=$id;
    }
    public function setUserID($user_id){
        $this->user_id=$user_id;
    }
    public function setCmdId($cmd_id){
        $this->cmd_id=$cmd_id;
    }
    public function setDateRec($date_rec){
        $this->date_rec=$date_rec;
    }
    public function setDescp($desc){
        $this->descp=$descp;
    }
    public function setEtat($etat){
        $this->etat=$etat;
    }
     */

}
