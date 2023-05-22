<?php
    
require_once('./app/DbConnexion.php');

class Model
{

protected PDO $bd;

public function __construct(){
   $db = new DbConnexion();
   $this->bd=$db->connexion();

}


}


