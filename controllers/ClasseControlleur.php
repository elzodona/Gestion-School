<?php

require_once('./models/Classe.php');
require_once('./app/Controlleur.php');


 class ClasseControlleur extends Controlleur
 {
    private $classeModel;

    public function __construct()
    {
        $this->classeModel=new Classe();
    }

    function lister()
    {
        $classes=$this->classeModel->all();
        $this->render('classe.php' ,$classes);

    }

    public function inserer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_classe = $_POST['nom_classe'];
            $niveau = $_POST['niveau'];

            $classe = new Classe();

            if ($classe->insert($nom_classe, $niveau)) {
                 echo "L'insertion a réussi";
            } else {
                echo "Une erreur s'est produite lors de l'ajout.";
            }
        }
    }

}


