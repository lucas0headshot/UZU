<!DOCTYPE html>
<html>
<head>
    <title>Home - UZU</title> <!-- Título -->
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--Fonte Open Sans -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC ?>Styles/Feed.css" rel="stylesheet">
</head>
<body>
    <section class="main-feed"> 
        <div class="sidebar"> <!-- Barra à esquerda -->
            <div class="logo-sidebar"> <!-- Logo sidebar-->
                <img src="<?php echo INCLUDE_PATH_STATIC?>Images/Logo - Preto.png"> 
            </div>
            <br/>
            <div class="menu-sidebar">
                <h4>Menu</h4>
                <br/>
                <a href="#">Feed</a>
                <a href="#">Perfil</a>
                <a href="#">Amigos</a>
            </div>
        </div> <!-- Sidebar -->

        <div class="feed">
            <div class="feed-single-post">
                <div class="feed-single-post-author">
                    <div class="img-single-post-author">
                        <!-- Colocar imagem :D-->
                    </div>
                    <h3>Lucas</h3>
                    <span>22:36 31/10/2022</span>
                </div>
                <div class="feed-single-post-content">
                    <p>Teste, teste e mais testes...</p>
                </div>
            </div>
        </div> <!-- Feed -->
    </section>
    
</body>
</html>