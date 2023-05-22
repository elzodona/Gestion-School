<?php

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);


require_once('./routeurs/Routeur.php');


$router = new Routeur();

$router->get('/', 'ConnexionControlleur@connect');

$router->get('/eleve', 'EleveControlleur@lister');
$router->post('/eleve', 'EleveControlleur@lister');

$router->get('/classe', 'ClasseControlleur@lister');
$router->post('/classe', 'ClasseControlleur@lister');

$router->get('/niveau', 'NiveauControlleur@lister');
$router->post('/niveau', 'NiveauControlleur@lister');

$router->get('/annee', 'AnneeControlleur@lister');
$router->post('/annee', 'AnneeControlleur@lister');


$router->post('/add', 'AnneeControlleur@inserer');

$router->post('/addClasse', 'ClasseControlleur@inserer');
$router->get('/addClasse', 'ClasseControlleur@inserer');

$router->post('/addEleve', 'EleveControlleur@inserer');
$router->get('/addEleve', 'EleveControlleur@inserer');

$router->post('/addNiveau', 'EleveControlleur@inserer');
$router->get('/addNiveau', 'EleveControlleur@inserer');



$router->run();



