<?php

    require('../database/conexao.php');

    $sql = "SELECT * FROM techman.equipamentos";

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
    <title>Novo Equipamento</title>

</head>

<body>

    <!-- INCLUSÃO DO COMPONENTE HEADER -->
    <?php include('../componentes/header/header.php'); ?>

    <div class="content">

        <section class="produtos-container">

            <!-- CASO O USUÁRIO ESTEJA LOGADO EXIBE OS BOTÕES DE CADASTRO -->

            <?php if(isset($_SESSION['usuarioId'])){?>
    
                <header>
                    <button onclick="javascript:window.location.href ='./novo/'">Novo Equipamento</button>
                </header>

            <?php } ?>    

            <main>

                <!-- LISTAGEM DE PRODUTOS (INICIO) -->

                <?php
                
                    while ($produto = mysqli_fetch_array($resultado)) {
                        // var_dump($produto);exit;
                ?>

                <article class="card-produto">

                <?php if(isset($_SESSION['usuarioId'])){?>

                    <div class="acoes-produtos">
                    <img onclick="javascript: window.location = './comentarios/?id=<?= $produto['id'] ?>'" src="../imgs/edit.svg" />
                    <img onclick="deletar(<?= $produto['id'] ?>)" src="../imgs/trash.svg" />
                    </div>
                    <?php } ?>
                <figure>
                     <img src="fotos/<?php echo $produto["imagem"]?>" />
                </figure>

                <section>
                    <span class="descricao"><?php echo $produto["descricao"]?></span>
                </article>

                <section>
                    <span class="descricao"><?php echo $produto["nome"]?></span>
                </article>

                <?php } ?>

                </section>

                <!-- LISTAGEM DE PRODUTOS (FIM) -->

                <!-- FORM USADO PARA A EXCLUSÃO DE PRODUTOS -->
                <form id="formDeletar" method="POST" action="./acoes.php">
                    <input type="hidden" name="acao" value="deletar" />
                    <input type="hidden" name="produtoId" id="produtoId" />
                </form>

            </main>

        </section>

    </div>

    <footer>
        SENAI 2021 - Todos os direitos reservados
    </footer>

    <!-- SCRIPT QUE DISPARA O FORM DE EXCLUSÃO DE PRODUTOS -->
    <script lang="javascript">
        function deletar(produtoId) {
            if (confirm("Atenção!Tem certeza que deseja excluir o equipamento?Essa ação não poderá ser desfeita!")) {
                document.querySelector("#produtoId").value = produtoId;
                document.querySelector("#formDeletar").submit();
            }
        }
    </script>

</body>

</html>