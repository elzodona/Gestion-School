<?php

require_once('./controllers/AnneeControlleur.php');
require_once('./controllers/ClasseControlleur.php');
require_once('./controllers/EleveControlleur.php');
require_once('./controllers/NiveauControlleur.php');
require_once('./controllers/ConnexionControlleur.php');


class Routeur
{
   public $routes=[];

    public function get(string $url, string $action)
  {
    $this->routes['GET'][$url]=$action;
  }

  public function post(string $url, string $action)
  {
    $this->routes['POST'][$url]=$action;
  }

 function run()
  {
    $userPath=$_SERVER['REQUEST_URI'];
    $method=$_SERVER['REQUEST_METHOD'];
    foreach ($this->routes[$method] as $path => $action)
    {
      if($path==$userPath)
    {
        $a=explode('@', $action);
        $method=$a[1];
        $controller=$a[0];
        $controller=new $controller();
        $controller->$method();
        return;
    }

    }
 }

}


