<?php

require_once('./app/Model.php');

 class Classe extends Model
 {
    private $id_classe;
    private $nom_classe;
    private $id_niveau;
    private $id_annee_scolaire;


    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $reponse =$this->bd->query('SELECT * FROM Classes');
        return $reponse->fetchAll();

    }

     public function insert($nom_classe, $niveau)
    {
        $query = "INSERT INTO Classes (nom_classe, niveau) VALUES (:nom_classe, :niveau)";
        $statement = $this->bd->prepare($query);

        $statement->bindParam(':nom_classe', $nom_classe);
        $statement->bindParam(':niveau', $niveau);

        
        if ($statement->execute()) {
            echo "L'insertion a réussi";
            return true;
        } else {
            echo "Erreur dans l'insertion";
            return false;
        }
    }



}


