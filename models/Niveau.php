<?php

require_once('./app/Model.php');

 class Niveau extends Model 
 {
    private $id_niveau;
    private $nom_niveau;

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $reponse =$this->bd->query('SELECT * FROM Niveaux');
        return $reponse->fetchAll();

    }

    // public function insert(array $data)
    // {
    //     $reponse =$this->bd->prepare('INSERT INTO articles (libelle, prix) VALUES (, )');
    // }



}







