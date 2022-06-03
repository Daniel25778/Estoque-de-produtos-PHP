<?php

    /* REDIRECIONA O FLUXO DE NAVEGAÇÃO PARA O INICIO DA APLICAÇÃO 
       NA PASTA DE PRODUTOS. O ARQUIVO INDEX DESSA PASTA RESOLVE A
       PÁGINA INICIAL DA APLICAÇÃO */
       $raiz = "/produtos-testes-mysql";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <div>
        <h1>Fazer Login</h1>
        <form method="POST" action="<?php echo $raiz?>/componentes/header/acoesLogin.php">
            <input type="hidden" name="acao" value="login" />
            <input type="password" name="senha" placeholder="Senha" />
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>