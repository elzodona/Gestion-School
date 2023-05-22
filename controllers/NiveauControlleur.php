<?php

require_once('./models/Niveau.php');
require_once('./app/Controlleur.php');


 class NiveauControlleur extends Controlleur
 {
    private $niveauModel;

    public function __construct()
    {
        $this->niveauModel=new Niveau();
    }

    function lister()
    {
        $niveaux=$this->niveauModel->all();
        $this->render('niveau.php' ,$niveaux);
        
        // $res = new Controlleur();
        // return $this->$res->json($articles);

    }

// public function ajouteArticle()
// {   
//     $data = json_decode(file_get_contents('php://input','r'), true);
//     $article= $this->articleModel->insert($data);    
//     $response = $this->commeJeVeux($article, "Register","201");
//     $this->json($response);
// }


}

?>