<?php

  session_start();

  /*
  CONEXÃO COM O BANCO DE DADOS
  
  produto/novo
  ../
  produto/
  ../
  /dabase/conexao.php

  */
  require('../../database/conexao.php');


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles-global.css" />
  <link rel="stylesheet" href="./novo.css" />
  <title>Administrar Produtos</title>
</head>

<body>

    <!-- INCLUSÃO DO COMPONENTE HEADER -->
    <?php include('../../componentes/header/header.php'); ?>

  <div class="content">

    <section class="produtos-container">

      <main>

        <form class="form-produto" method="POST" action="../acoes.php" enctype="multipart/form-data">

          <input type="hidden" name="acao" value="comentar" />

          <h1>Adicionar comentario</h1>

          <ul>

            <?php
            
              if (isset($_SESSION["erros"])) {
                
                foreach ($_SESSION["erros"] as $erro) {
                  
                  echo "<li> $erro </li>";

                }

                unset($_SESSION["erros"]);

              }
            
            ?>

          </ul>

          <div class="input-group span2">
            <label for="descricao">Comentario</label>
            <input type="text" name="comentario" id="comentario" >
          </div>

          <button onclick="javascript:window.location.href = '../'">Cancelar</button>
          <button>Salvar</button>

        </form>

      </main>

    </section>
  </div>

  <footer>
    SENAI 2021 - Todos os direitos reservados
  </footer>
  
</body>

</html>