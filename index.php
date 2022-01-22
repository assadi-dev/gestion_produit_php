<?php


define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

/**Models */
require_once(ROOT.'/vendor/autoload.php');
require_once(ROOT.'src/Models/Model.php');
require_once(ROOT.'src/Controllers/Controller.php');

$params = explode('/', $_GET["p"]);

if($params[0] !== ""){
    $controller = ucfirst($params[0]);
    $action = isset($params[1]) ? $params[1] :"index";
    require_once(ROOT.'src/Controllers/'.$controller."Controller.php");
    $controller = new $controller();
    if(method_exists($controller,$action)){
        //$controller->$action();
        unset($params[0]);
        unset($params[1]);
        call_user_func([$controller,$action],$params);
        
    }else{
        http_response_code(404);
        echo "la page demander n'existe pas !";
    }
    
   
}else{

    require_once(ROOT.'src/Controllers/MainController.php');
    $controller = new Main();
    $controller->index();

}