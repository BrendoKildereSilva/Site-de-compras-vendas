<?php
    header("Access-Control-Allow-Origin: *");
    use app\database\Connection;



    try{

        $email = htmlentities($_REQUEST['email']);
        $pdo = Connection::ConectandoAoBanco();
        $cod_mysql_if_existe_email = $pdo->prepare("SELECT email from info_users WHERE email = '$email'");
        $cod_mysql_if_existe_email->execute();
        // 
        $resultado = $cod_mysql_if_existe_email->rowCount();
        

        if($resultado >= 1){
            echo 'Email em uso';
        }
        else{
            echo 'Email não está em uso';
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }

    



