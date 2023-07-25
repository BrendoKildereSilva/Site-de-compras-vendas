<?php

namespace app\controllers;

class login{

    function FunctionLogin(){
        controller::GerarViews('ComponentLogin');
    }

    function FunctionAnalizarToken(){
        controller::GerarViews('AnalizarToken');
    }
}