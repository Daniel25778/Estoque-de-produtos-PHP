<?php

    require('../../database/conexao.php');

    $sql = "SELECT * FROM techman.comentarios";

    $resultado = mysqli_query($conexao, $sql);

    // // TESTE DE SELEÇÃO DE DADOS:
    // var_dump($resultado);exit;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles-global.css" />
    <link rel="stylesheet" href="./produtos.css" />
    <title>Comentários</title>

</head>

<body>

    <!-- INCLUSÃO DO COMPONENTE HEADER -->

  
   
    <div class="content">

        <section class="produtos-container">

            <!-- CASO O USUÁRIO ESTEJA LOGADO EXIBE OS BOTÕES DE CADASTRO -->

            <?php if(!isset($_SESSION['usuarioId'])){?>
    
              <header>
                    <button onclick="javascript:window.location.href ='../novoComentario/'">Novo Comentário</button>
                </header>

            <?php } ?>    

            <main>

                <!-- LISTAGEM DE COMENTARIOS (INICIO) -->

                <?php
                
                    while ($produto = mysqli_fetch_array($resultado)) {
                        // var_dump($produto);exit;
                ?>

                <article class="card-produto">


                <section>
                    <span class="comentario"><?php echo $produto["comentario"]?></span>
                </article>


                <?php } ?>

                </section>

                <!-- LISTAGEM DE COMENTARIOS (FIM) -->

            </main>

        </section>

    </div>


</body>

</html>