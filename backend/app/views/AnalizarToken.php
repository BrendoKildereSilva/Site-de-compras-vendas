<?php 
$this->layout('master'); 
header("Access-Control-Allow-Origin: *");

use app\database\Connection;
use Firebase\JWT\JWT;
use app\functions\functions;
use Firebase\JWT\Key;



$token = htmlentities($_REQUEST['token']);

$decoficicando_token = JWT::decode($token, new key('key', 'HS256'));  
// o proprio jwt já analiza o token e se for aparcer algum problema o códico para.


// 
$email = $decoficicando_token->email;
// 
$pdo = Connection::ConectandoAoBanco();
// 
$cod_mysql_buscar_dados = $pdo->prepare("SELECT nome, sobrenome, email,foto_perfil FROM info_users WHERE email = '$email'");
$cod_mysql_buscar_dados->execute();
// 
$resultado_da_busca_de_dados = $cod_mysql_buscar_dados->fetchALL(PDO::FETCH_ASSOC);



$reposta_client['mensagem'] = 'token valido';
$reposta_client['dados_user'] = $resultado_da_busca_de_dados;
echo json_encode($reposta_client);

