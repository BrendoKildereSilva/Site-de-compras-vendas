<?php 
$this->layout('master'); 
header("Access-Control-Allow-Origin: *");

use app\database\Connection;
use Firebase\JWT\JWT;
use app\functions\functions;
use Firebase\JWT\Key;



$token = $_REQUEST['token'];

$decoficicando_token = JWT::decode($token, new key('key', 'HS256'));  
// o proprio jwt já analiza o token e se for aparcer algum problema o códico para.


$reposta_client['mensagem'] = 'token valido';
$reposta_client['dados_user'] = $decoficicando_token;

echo json_encode($reposta_client);


