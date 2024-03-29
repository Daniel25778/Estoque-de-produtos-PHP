
<?php


session_start();



$raiz = "/produtos-testes-mysql";


?>

<link href="<?php echo $raiz?>/componentes/header/header.css" rel="stylesheet" />

<header class="header">

    <figure>
        <a >
            <img src="<?php echo $raiz?>/imgs/techman.png" />
        </a>
    </figure>


    <?php
    if (!isset($_SESSION["usuarioId"])) {
    ?>
        <nav>
            <ul>
                <a id="menu-admin">Fazer Login</a>
            </ul>
        </nav>
        <div id="container-login" class="container-login">
            <h1>Fazer Login</h1>
            <form method="POST" action="<?php echo $raiz?>/componentes/header/acoesLogin.php">
                <input type="hidden" name="acao" value="login" />
                <input type="password" name="senha" placeholder="Senha" />
                <button type="submit">Entrar</button>
            </form>
        </div>
    <?php
    } else {
    ?>
        <nav>
            <ul>
                <a id="menu-admin" onclick="logout()">Sair</a>
            </ul>
        </nav>
       
        <form id="form-logout" style="display:none" method="POST" action="<?php echo $raiz ?>/componentes/header/acoesLogin.php">
            <input type="hidden" name="acao" value="logout" />
        </form>
    <?php
    }
    ?>

</header>

<script lang="javascript">
    document.querySelector("#menu-admin").addEventListener("click", toggleLogin);
    document.querySelector("#adicionarEquipamento").addEventListener("click", openModal);
    function logout() {
        document.querySelector("#form-logout").submit();
    }

    function toggleLogin() {
        let containerLogin = document.querySelector("#container-login");
        let h1Form = document.querySelector("#container-login > h1");
        let form = document.querySelector("#container-login > form");
        //se estiver oculto, mostra 
        if (containerLogin.style.opacity == 0) {
            h1Form.style.display = "block";
            form.style.display = "flex";
            containerLogin.style.opacity = 1;
            containerLogin.style.height = "200px";
            //se não, oculta
        } else {
            h1Form.style.display = "none";
            form.style.display = "none";
            containerLogin.style.opacity = 0;
            containerLogin.style.height = "0px";
        }
    }

</script>

