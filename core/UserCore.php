<?php
require_once '../../config/Config.php';
class UserCore  
{
    public $db;

    public function __construct() {
        $this->db=Config::getConnexion();
    }

    public function login($cond){
        $sql = "SELECT * FROM user WHERE username=:username AND password=:password";
        $pre = $this->db->prepare($sql);
        $pre->bindValue(':username',$cond['username']);
        $pre->bindValue(':password',$cond['password']);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_OBJ);
    }
    
}
 