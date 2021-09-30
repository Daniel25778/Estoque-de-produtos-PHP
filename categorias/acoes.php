<?php

/**CONEXAO COM O BANCO DE DADOS*/
require('../database/conexao.php');


/**TRATAMENTO DOS DADOS VINDOS DO FORMULARIO*/
switch ($_POST['acao']) {
    case 'inserir':
        // echo "inserir";

        $descricao = $_POST['descricao'];


        /**MONTAGEM DA INSTRUÇÃO DE DADOS: */
        $sql = "INSERT INTO tbl_categoria(descricao) VALUES ('$descricao')";
        // echo $sql;

        $resultado = mysqli_query($conexao, $sql);

        // echo '<pre>';
        // var_dump($resultado);
        // echo '</pre>';
        // exit;

        header('location:index.php');

        break;
    
      
    default:
        # code...
        break;
}


             /**TIPOS DA AÇÃO*/
/**EXECUÇÃO DOS PROCESSOS DA AÇÃO SOLICITADA*/