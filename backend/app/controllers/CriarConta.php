<?php

namespace app\controllers;

class CriarConta{

    function FunctionCriarNovoUser(){
        controller::GerarViews('criar-conta/NewUser');
    }

    function FunctionVerificarEmail(){
        controller::GerarViews('criar-conta/verificar_email');
    }
}