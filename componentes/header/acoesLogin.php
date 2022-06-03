<?php

session_start();

require("../../database/conexao.php");


switch ($_POST['acao']) {
    case 'login':
        
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        realizarLogin($usuario, $senha, $conexao);

        break;
    
    case 'logout':
        
       session_destroy();

       header("location: /produtos-testes-mysql/index.php");

        break;
    
    default:
        # code...
        break;
}


function realizarLogin ($usuario, $senha, $conexao){
    $sql = "SELECT * FROM usuarios WHERE  senha = '$senha'";

    $resultado = mysqli_query($conexao, $sql);
    $dadosUsuario = mysqli_fetch_array($resultado);

    if(isset($dadosUsuario["senha"]) && $dadosUsuario["senha"] == $senha){

        $_SESSION["usuarioId"] = $dadosUsuario["id"];

        header("location: ../../produtos/index.php");

       echo 'LOGADO!';


     header("location: ../../produtos/index.php");

    }else{
        echo 'SENHA INCORRETA!';
    }

}



    





