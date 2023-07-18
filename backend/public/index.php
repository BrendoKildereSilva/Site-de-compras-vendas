<?php

require '../vendor/autoload.php';
require '../routers/routers.php';

try{
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $typeRq = $_SERVER['REQUEST_METHOD'];

    
    if(!isset($routers[$typeRq])){
        throw new Exception('Essa rota não existe');
    }
    

    if(!array_key_exists($uri ,$routers[$typeRq])){
        throw new Exception('Essa rota não existe');
    }
    

    $CallRota = $routers[$typeRq][$uri];
    $CallRota();
}
    catch(Exception $e){
    echo $e->getMessage();

}


