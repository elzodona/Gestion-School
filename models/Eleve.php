<?php

require_once('./app/Model.php');

 class Eleve extends Model
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
        $reponse =$this->bd->query('SELECT * FROM Eleves');
        return $reponse->fetchAll();

    }
 
    public function insert($nom_eleve, $prenom_eleve, $numero_eleve, $type_eleve, $id_classe)
    {
        $query = "INSERT INTO Eleves (nom_eleve, prenom_eleve, numero_eleve, type_eleve, id_classe ) VALUES (:nom_eleve, :prenom_eleve, :numero_eleve, :type_eleve, :id_classe)";
        $statement = $this->bd->prepare($query);

        $statement->bindParam(':nom_eleve', $nom_eleve);
        $statement->bindParam(':prenom_eleve', $prenom_eleve);
        $statement->bindParam(':numero_eleve', $numero_eleve);
        $statement->bindParam(':type_eleve', $type_eleve);
        $statement->bindParam(':id_classe', $id_classe);

        
        if ($statement->execute()) {
            echo "L'insertion a réussi";
            return true;
        } else {
            echo "Erreur dans l'insertion";
            return false;
        }
    }



}


