<!DOCTYPE html>
<html>

<head>
    <title>Registrar na UZU</title> <!-- Título -->
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
            <p>Crie uma conta para divertir-se com seus amigos!</p>
        </div>

        <div class="form-login"> <!-- Formulário Login -->
            <h2 style="text-align: center;">Crie sua conta!</h2>
            <form method="post">
                <input type="text" placeholder="Seu nome" name="nome">
                <input type="text" placeholder="Seu uzer" name="usuario">
                <input type="text" placeholder="Seu e-mail" name="email">
                <input type="password" placeholder="Sua senha" name="senha">
                <input type="password" placeholder="Repita sua senha" name="senhaRepetida">
                <input type="submit" name="acao" value="Criar Conta!">
                <input type="hidden" name="registrar" value="registrar">
            </form>
            <p><a href="<?php echo INCLUDE_PATH ?>">Voltar</a></p>
        </div>
    </div>

</body>
</html>