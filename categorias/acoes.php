<?php


session_start();
/**CONEXAO COM O BANCO DE DADOS*/
require('../database/conexao.php');

/**FUNCAO DE VALIDACAO */

function validaCampos(){

  $erros = [];

  if(!isset($_POST['descricao']) || $_POST['descricao'] == ""){

    $erros[] = "O campo descrição é de preenchimento obrigatório";

  }

  return $erros;

}


/**TRATAMENTO DOS DADOS VINDOS DO FORMULARIO*/
switch ($_POST['acao']) {
    case 'inserir':
      
        /**CHAMADA DA FUNÇÃO DE VALIDAÇÃO */
        $erros = validaCampos();

        /**VERIFICAÇÃO SE EXISTEM ERROS */

        if(count($erros) > 0){

            $_SESSION["erros"] = $erros;

   
            header('location:index.php');
        
            exit;

        }

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
    
      
        case 'deletar':
        
            $categoriaId = $_POST['categoriaId'];

            $sql = "DELETE FROM tbl_categoria WHERE id = $categoriaId";

            $resultado = mysqli_query($conexao, $sql);

            header('location:index.php');

        break;

        case 'editar':

        $id = $_POST["id"];
        $descricao = $_POST["descricao"];

        $sql = "UPDATE tbl_categoria SET descricao = '$descricao' WHERE id = $id";

        $resultado = mysqli_query($conexao, $sql);

        header("location: index.php");

        break;
}


             /**TIPOS DA AÇÃO*/
/**EXECUÇÃO DOS PROCESSOS DA AÇÃO SOLICITADA*/

