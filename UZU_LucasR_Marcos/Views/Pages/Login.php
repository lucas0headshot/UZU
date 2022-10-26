<!DOCTYPE html>
<html>
<head>
    <title>Login na UZU -  Rede Social para Gamers</title> <!-- Título -->
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--Fonte Open Sans -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC ?>Styles/Style.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar"></div> <!-- Barra ao lado esquerdo -->
    
    <div class="form-container-login"> 
        <div class="logo-login"> <!-- Logo -->
            <img src="<?php echo INCLUDE_PATH_STATIC ?>Images/Logo - Roxo.png">
            <p>Conecte com seus amigos e tenha um tempo produtivo</p>
        </div>

        <div class="form-login"> <!-- Formulário login -->
            <form>
                <input type="text" name="login">
                <input type="password" name="senha">
                <input type="submit" name="acao" value="Logar">
            </form>
            <p><a href="<?php echo INCLUDE_PATH ?>Registrar">Criar conta</a></p>
        </div>
    </div>

</body>
</html>