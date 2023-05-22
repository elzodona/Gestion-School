<?php

require_once('./models/Annee.php');
require_once('./app/Controlleur.php');

class AnneeControlleur extends Controlleur
{
    private $anneeModel;

    public function __construct()
    {
        $this->anneeModel = new Annee();
    }

    public function lister()
    {
        $annees = $this->anneeModel->all();
        $this->render('annee.php', $annees);

    }

    public function inserer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $anneeScolaire = $_POST['annee'];
            $actif = $_POST['etat'];

            $annee = new Annee();

            if ($annee->insert($anneeScolaire, $actif)) {
                echo "L'année scolaire a été ajoutée avec succès.";
            } else {
                echo "Une erreur s'est produite lors de l'ajout de l'année scolaire.";
            }
        }
    }
}
