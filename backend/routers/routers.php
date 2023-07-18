<?php

function load(String $controller, String $action){
    try{

        
        $PathDoController = "app\\controllers\\{$controller}";

        if(!class_exists($PathDoController)){
            throw new  Exception('Erro, o controller '. $controller . ' não existe!');
        }
        
        $InstanciaPathController = new $PathDoController();
        
        if(!method_exists($InstanciaPathController, $action)){
            throw new  Exception('Erro, a rota '. $action . ' não existe!');
        }


        $InstanciaPathController->$action();
        
    }
        catch(Exception $e){
        echo $e->getMessage();

    }

}

$routers = [
    "GET" => [
        "/" => fn() => load('HomeController', 'index'),
    ], 
    "POST" => [
        "/login" => fn() => load('login', 'FunctionLogin'),
        "/criar-conta" => fn() => load('CriarConta', 'FunctionCriarNovoUser'),
        "/criar-conta/verificar-email" => fn() => load('CriarConta', 'FunctionVerificarEmail'),
    ] 
];