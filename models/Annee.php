<?php

require_once('./app/Model.php');

 class Annee extends Model
 {
    private $id_annee_scolaire;
    private $annee_scolaire;
    private $active;


   public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $reponse =$this->bd->query('SELECT * FROM Annees_Scolaires');
        return $reponse->fetchAll();

    } 

    public function insert($anneeScolaire, $actif)
    {
        $query = "INSERT INTO Annees_Scolaires (annee_scolaire, actif) VALUES (:annee, :actif)";
        $statement = $this->bd->prepare($query);

        $statement->bindParam(':annee', $anneeScolaire);
        $statement->bindParam(':actif', $actif);
        
        if ($statement->execute()) {
            echo "L'insertion a réussi";
            return true;
        } else {
            echo "Erreur dans l'insertion";
            return false;
        }
    }




}


