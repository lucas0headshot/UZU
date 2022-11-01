<!DOCTYPE html>
<html>

<head>
    <title>Logar na UZU</title> <!-- Título -->
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--Fonte Open Sans -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC ?>Styles/Style.css" rel="stylesheet">
</head>

<body>

    <div class="sidebar"></div> <!-- Barra lado esquerdo -->

    <div class="form-container-login">
        <div class="logo-login">
            <img src="<?php echo INCLUDE_PATH_STATIC ?>Images/Logo - Preto.png"> <!-- Logo Login -->
            <p>Faça login e divirta-se com seus amigos!</p>
        </div>

        <div class="form-login"> <!-- Formulário Login -->
            <form method="post">
                <input type="text" placeholder="E-mail" name="Email">
                <input type="password" placeholder="Senha" name="Senha">
                <input type="submit" name="acao" value="Logar!">
                <input type="hidden" name="login">
            </form>
            <p><a href="<?php echo INCLUDE_PATH ?>Registrar">Criar conta</a></p>
        </div>
    </div>

</body>
</html>