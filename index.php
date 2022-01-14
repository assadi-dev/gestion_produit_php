<?php
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

/**Models */
require_once(ROOT.'src/model/model.php');

require_once(ROOT.'src/controller/controller.php');

$params = explode('/', $_GET["p"]);

if($params[0] !== ""){
    $controller = ucfirst($params[0]);
    $action = isset($params[1]) ? $params[1] :"index";
    require_once(ROOT.'src/controller/'.$controller."Controller.php");
    $controller = new $controller();
    if(method_exists($controller,$action)){
        $controller->$action();
        
    }else{
        http_response_code(404);
        echo "la page demander n'existe pas !";
    }
    
   
}else{



}