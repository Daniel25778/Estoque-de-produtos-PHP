<?php

    session_start();

    require("../database/conexao.php");

    function validarCampos(){


        //ARRAY DAS MENSAGENS DE ERRO
        $erros = [];

        //VALIDAÇÃO DE DESCRIÇÃO
        if ($_POST["descricao"] == "" || !isset($_POST["descricao"])) {
            $erros[] = "O CAMPO DESCRIÇÃO É OBRIGATÓRIO";
        }
        if ($_POST["nome"] == "" || !isset($_POST["nome"])) {
            $erros[] = "O CAMPO NOME É OBRIGATÓRIO";
        }
        if ($_POST["imagem"] == "" || !isset($_POST["imagem"])) {
            $erros[] = "O CAMPO IMAGEM É OBRIGATÓRIO";
        }
        if ($_POST["ativo"] == "" || !isset($_POST["ativo"])) {
            $erros[] = "O CAMPO ATIVO É OBRIGATÓRIO";
        }
        return $erros;
    }

    
    switch ($_POST["acao"]) {

        case 'inserir':

            $erros = validarCampos();

            if (count($erros) > 0) {
                
                $_SESSION["erros"] = $erros;

                header("location: novo/index.php");

                exit;

            }
            /* INSERÇÃO DE DADOS NA BASE DE DADOS DO MYSQL: */

            //RECEBIMENTO DOS DADOS:
            $imagem = $_POST["imagem"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];
            $data = date("Y-m-d H:i:s");
            $nome = $_POST["nome"];

            //CRIAÇÃO DA INSTRUÇÃO SQL DE INSERÇÃO:
            $sql = "INSERT INTO equipamentos (imagem,descricao,ativo,data,nome) VALUES ('$imagem','$descricao','$ativo','$data','$nome')";
            

            //EXCUÇÃO DO SQL DE INSERÇÃO:
            $resultado = mysqli_query($conexao, $sql);

            //REDIRECIONAR PARA INDEX:
            header('location: index.php');

            break;

        case "deletar":

            $produtoId = $_POST["produtoId"];

            $sql = "DELETE FROM `techman`.`equipamentos` WHERE id = $produtoId";

            $resultado = mysqli_query($conexao, $sql);

            header("location: index.php");

        break;

        case "comentar"

       
        /* INSERÇÃO DE DADOS NA BASE DE DADOS DO MYSQL: */

        //RECEBIMENTO DOS DADOS:
        $comentario = $_POST["comentario"];

        //CRIAÇÃO DA INSTRUÇÃO SQL DE INSERÇÃO:
        $sql = "INSERT INTO comentarios (comentario) VALUES ('$comentario')";
        

        //EXCUÇÃO DO SQL DE INSERÇÃO:
        $resultado = mysqli_query($conexao, $sql);

        //REDIRECIONAR PARA INDEX:
        header('location: index.php');

        break;

        
        default:
            # code...
            break;
    }

?>