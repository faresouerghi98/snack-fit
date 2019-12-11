<?php



$db=new PDO('mysql:host=localhost; dbname=snack-fit;',
                        'root',
                        '',
                        array((PDO::MYSQL_ATTR_INIT_COMMAND) => 'SET NAMES utf8')
                        );

$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

$sql="DELETE FROM participer WHERE DATEDIFF(SYSDATE(),date_res)>0 AND etat='non payee' ";

try{
    $req=$db->prepare($sql);
    $req->bindParam(":id",$id,PDO::PARAM_INT);
    $req->execute();

}catch(Execption $e){
    die("Erreur : " .$e->getMessage());
}
