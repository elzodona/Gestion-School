<?php


require_once('./app/Controlleur.php');


 class ConnexionControlleur extends Controlleur
 {

    function connect()
    {
        $this->render('fichier.php' ,[]);

    }

}

?>