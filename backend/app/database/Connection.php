<?php

namespace app\database;
use PDO;

class Connection {
    static function ConectandoAoBanco(){
        return new PDO('mysql:host=localhost;dbname=shop','root','');
    }
}