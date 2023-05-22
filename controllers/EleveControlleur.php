<?php

require_once('./models/Eleve.php');
require_once('./app/Controlleur.php');


 class EleveControlleur extends Controlleur
 {
    private $eleveModel;

    public function __construct()
    {
        $this->eleveModel=new Eleve();
    }

    function lister()
    {
        $eleves=$this->eleveModel->all();
        $this->render('eleve.php' ,$eleves);

    }

     public function inserer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_eleve = $_POST['nom'];
            $prenom_eleve = $_POST['prenom'];
            $numero_eleve = $_POST['num'];
            $type_eleve = $_POST['typeE'];
            $id_classe = $_POST['classe'];

            $eleve = new Eleve();

            if ($eleve->insert($nom_eleve, $prenom_eleve, $numero_eleve, $type_eleve, $id_classe)) {
                 echo "L'insertion a réussi";
            } else {
                echo "Une erreur s'est produite lors de l'ajout.";
            }
        }
    }



}

?>