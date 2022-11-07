<!DOCTYPE html>
<html>
<head>
    <title>Bem-vindo, <?php echo $_SESSION['Nome'];?></title> <!-- Título -->
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--Fonte Open Sans -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="<?php echo INCLUDE_PATH_STATIC ?>Styles/Feed.css" rel="stylesheet">
</head>
<body>
    <section class="main-feed"> 
        <?php 
			include('Includes/Sidebar.php'); 
		?>        

        <div class="feed">
            <div class="editar-perfil">
                <h2>Editar perfil</h2>
                <br/>
                <?php 
                    if (isset($_SESSION['Img']) && $_SESSION['Img'] == 'Img'){
                        echo '<img style="max-widht: 400px; max-widht: 100%;" src="'.INCLUDE_PATH_STATIC.'Images/Avatar - Roxo.png" />';
                    }else{
                        echo '<img style="max-widht: 400px; max-widht: 100%;%;" src="'.INCLUDE_PATH.'Uploads/'.$_SESSION['Img'].'" />';
                    }
                ?>
                <br/>
                <form method="POST" enctype="multipart/form-data">
                    <input type="text" name="Nome" value="<?php echo $_SESSION['Nome']?>">
                    <input type="password" name="Senha" placeholder="Nova senha"">
                    <input type="file" name="file">
                    <input type="hidden" name="atualizar" value="atualizar">
                    <input type="submit" name="acao" value="Salvar!">
                </form>
            </div>

		</div> <!--feed-->
    </section>
    
</body>
</html>