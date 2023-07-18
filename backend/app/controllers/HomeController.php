<?php

namespace app\controllers;

class HomeController{
    function index(){
        controller::GerarViews('home');
    }
}