<?php 
$this->layout('master'); 
use app\database\Connection;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
header("Access-Control-Allow-Origin: *");
    
$email = htmlentities($_REQUEST['email']);
$senha = htmlentities($_REQUEST['senha']);

$pdo = Connection::ConectandoAoBanco();

$cod_mysql_confirm_email_senha = $pdo->prepare("SELECT email, senha FROM info_users WHERE email = '$email' AND senha = '$senha'");
$cod_mysql_confirm_email_senha->execute();

$resultado_email_and_senha = $cod_mysql_confirm_email_senha->rowCount();
// 
// 
$cod_mysql_confirm_email = $pdo->prepare("SELECT foto_perfil FROM info_users WHERE email = '$email'");
$cod_mysql_confirm_email->execute();
// 
// 
$resultado_email = $cod_mysql_confirm_email->rowCount();


$_resposta_client = [
    
    'Dados' => [],
    'token' => '',
    'mensagem' => ''
];

if($resultado_email_and_senha >= 1){

    // Usando JWT (json web token)
    $key = 'key';
    $payload = [
        'email' => $email
    ];

    $jwt = JWT::encode($payload, $key, 'HS256');

    $_resposta_client['token'] = $jwt;
    $_resposta_client['mensagem'] = 'Dados validos';

}
else if($resultado_email >= 1){
    // se apenas o email for correto vou enviar apenas foto de perfil do user para confirmar se a conta realmente o pertece

    $Dados = $cod_mysql_confirm_email->fetchALL(PDO::FETCH_ASSOC);
    
    $_resposta_client['mensagem'] = 'Apenas o email é valido';
    $_resposta_client['Dados']['foto_perfil'] = $Dados;
    $_resposta_client['Dados']['Diretorio'] = 'http://localhost/projetos/Vue%20+%20php/ex02/backend/banco-imagens/foto_perfil_users/ ';


}
else{
    $_resposta_client['mensagem'] = 'Dados invalidos';
}


echo json_encode($_resposta_client);





?>
