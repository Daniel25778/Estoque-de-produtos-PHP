<?php

require("../database/conexao.php");

switch ($_POST["acao"]) {
    case 'inserir':

        /**TRATAMENTO DE IMAGEM PARA UPLOAD: */

        /**RECUPERA O NOME DO ARQUIVO */

        $nomeArquivo = $_FILES["foto"]["name"];
        
        /**RECUPERAR A EXTENSÃO DO ARQUIVO */

        $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

        /**DEFINIR UM NOME PARA O ARQUIVO DE IMAGEM*/

        $novoNome = md5(microtime()). "." . $extensao;


        /**UPLOAD DO ARQUIVO*/

        move_uploaded_file($_FILES["foto"]["tmp_name"], "fotos/$novoNome");
        
        header("location: index.php");


        $descricao = $_POST["descricao"];
        $peso = $_POST["peso"];
        $quantidade = $_POST["quantidade"];
        $cor = $_POST["cor"];
        $tamanho = $_POST["tamanho"];
        $valor = $_POST["valor"];
        $desconto = $_POST["desconto"];
        $categoriaId = $_POST["categoria"];
       
        //**CRIAÇÃO DE INSTRUÇÃO SQL DE  */

        $sql = "INSERT INTO tbl_produto 
        (descricao,peso,quantidade,cor,tamanho,valor,desconto,imagem,categoria_id) VALUES ('$descricao', $peso, $quantidade, '$cor', '$tamanho', $valor, $desconto, '$novoNome', '$categoriaId' )";

        /**EXECUÇÃO DO SQL DE INSERÇÃO */

        $resultado = mysqli_query($conexao, $sql);

        break;
    
        default:
            # code...
            break;
}