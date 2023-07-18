<?php 
$this->layout('master'); 
header("Access-Control-Allow-Origin: *");
use app\database\Connection;

try{

    
    $nome = htmlentities($_REQUEST['nome']);
    $sobrenome = htmlentities($_REQUEST['sobrenome']);
    $email = htmlentities($_REQUEST['email']);
    $senha = htmlentities($_REQUEST['senha']);
    
    
    
    if(isset($_FILES['foto_perfil'])){
        
        $fileImg = $_FILES['foto_perfil'];
        
        // verificar extensão
        $ExtensaoImg = strtolower(substr($fileImg['name'], -4));
        
        if($ExtensaoImg != '.png' && $ExtensaoImg != ".jpg" ){
            throw new Exception('Apenas fotos png e jpg!');
        }

        $diretorio_imagens_perfil_user = '../banco-imagens/foto_perfil_users/';
        $name_img = md5(time()) . $ExtensaoImg;
        
        move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $diretorio_imagens_perfil_user.$name_img); 
    }

    $pdo = Connection::ConectandoAoBanco();
    $cod_mysql_inserir_dados_new_user = $pdo->prepare("INSERT INTO info_users(nome, sobrenome, email, senha, foto_perfil) 
    VALUES('$nome', '$sobrenome', '$email', '$senha', '$name_img')");

    $cod_mysql_inserir_dados_new_user->execute();

    

    
}
catch(Exception $e){
    echo $e->getMessage();

}

?>

