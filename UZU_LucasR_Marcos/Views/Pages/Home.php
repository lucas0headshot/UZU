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
			<div class="feed-wraper">
			<div class="feed-form"> <!-- Feed Form -->
				<form method="post">
					<textarea required="" name="post_content" placeholder="No que você está pensando?"></textarea>
					<input type="hidden" name="post_feed">
					<input type="submit" value="Postar!">
				</form>
			</div>	<!-- Fim Feed Form -->
			
			<?php
				$retrievePosts = \UZU_LucasR_Marcos\Models\HomeModel::retrieveFriendsPosts();

				foreach ($retrievePosts as $key=> $value){

			?>

			<div class="feed-single-post"> <!-- Post -->
				<div class="feed-single-post-author">
					<div class="img-single-post-author">

					<?php
						if (!isset($value['me']) && $value['Img'] == ''){
					?>
						<img src="<?php echo INCLUDE_PATH_STATIC ?>images/Avatar - Roxo.png" />

					<?php }else if (!isset($value['me'])){ ?>
						<img src="<?php echo INCLUDE_PATH ?>Uploads/<?php echo $value['Img'] ?>" />
					<?php } ?>

					<?php
						if(isset($value['me']) && $_SESSION['Img'] == ''){
					?>
						<img src="<?php echo INCLUDE_PATH_STATIC ?>Images/Avatar - Roxo.png" />

					<?php }else if (isset($value['me'])){ ?>
						<img src="<?php echo INCLUDE_PATH ?>Uploads/<?php echo $_SESSION['Img'] ?>" />
					<?php } ?>

					</div>
					<div class="feed-single-post-author-info">
						
						<?php
							if (isset($value['me']) and ($value['Uzer'] == '')){ ?>
								<h3><?php echo $_SESSION['Nome']?> (Eu)</h3>
						<?php }else if (isset($value['me']) and ($value['Uzer'] != '')){ ?>
								<h3><?php echo $_SESSION['Uzer']?></h3>
						<?php }else if ($value['Uzer'] == ''){ ?>
								<h3><?php echo $value['Nome']?></h3>
						<?php }else if ($value['Uzer'] != ''){ ?>
								<h3><?php echo $value['Uzer']?></h3>
						<?php } ?>
						<p><?php echo date('d/m/Y H:i:s', strtotime($value['Data']))?></p> <a value="<?php $value['ID']?>" href="<?php echo INCLUDE_PATH?>verPerfil?verPerfil">Ver Perfil</a>
					</div>
				</div>
				<div class="feed-single-post-content">
					<?php echo $value['Conteudo']?>
				</div>
			</div> <!-- Fim Post -->

			<?php } ?>

		</div> 

			<div class="friends-request-feed">
				<h4>Solicitações de amizade</h4>

				<?php
					foreach(\UZU_LucasR_Marcos\Models\UsuariosModel::listarAmizadesPendentes() as $key=> $value){
					$usuarioInfo = \UZU_LucasR_Marcos\Models\UsuariosModel::getUsuarioByID($value['Enviou']);
				?>

				<div class="friend-request-single">
					<img src="<?php echo INCLUDE_PATH_STATIC ?>images/Avatar - Roxo.png" />
					<div class="friend-request-single-info">
						<h3> <?php echo $usuarioInfo['Nome']?> </h3>
						<p><a href="<?php echo INCLUDE_PATH?>?aceitarAmizade=<?php echo $usuarioInfo['ID']?>">Aceitar</a>|
						<a href="<?php echo INCLUDE_PATH?>?recusarAmizade=<?php echo $usuarioInfo['ID']?>">Recusar</a></p>
					</div>
				</div>

				<?php } ?>

			</div>
		</div> <!--feed-->
    </section>
    
</body>
</html>