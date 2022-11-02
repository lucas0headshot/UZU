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
    <link href="<?php echo INCLUDE_PATH_STATIC ?>Styles/Comunidade.css" rel="stylesheet">
</head>
<body>
    
<section class="main-feed"> 
		<?php 
			include('includes/sidebar.php'); 
		?>
		<div class="feed">	<!-- Feed -->
			<div class="comunidade">
			<div class="container-comunidade">	<!-- Amigos -->
					<h4>Amigos</h4>
					<div class="container-comunidade-wraper">
						<div class="container-comunidade-single">
							<div class="img-comunidade-user-single">
								<img src="<?php echo INCLUDE_PATH_STATIC ?>Images/Avatar - Roxo.png" />
							</div>
							<div class="info-comunidade-user-single">
								<h2>Teste</h2>
								<p>teste@gmail.com</p>
							</div>
						</div>
					</div>
				</div> <!-- Fim Amigos -->
			<br/>

				<div class="container-comunidade"> <!-- Comunidade -->
					<h4>Comunidade</h4>
					<div class="container-comunidade-wraper">

						<?php
							$comunidade = \UZU_LucasR_Marcos\Models\UsuariosModel::listarComunidade();

							foreach ($comunidade as $key => $value){

								if ($value['ID'] == $_SESSION['id']){
									continue;
								}
						?>

						<div class="container-comunidade-single">
							<div class="img-comunidade-user-single">
								<img src="<?php echo INCLUDE_PATH_STATIC ?>Images/Avatar - Roxo.png" />
							</div>
							<div class="info-comunidade-user-single">
								<h2> <?php echo $value['Nome'];?> </h2>
								<p> <?php echo $value['Email'];?> </p>
							<div class="btn-solicitar-amizade">
								<?php
									if (\UZU_LucasR_Marcos\Models\UsuariosModel::existePedidoAmizade($value['ID'])){
								?>
								<a href="<?php echo INCLUDE_PATH ?>Comunidade?solicitarAmizade=<?php echo $value['ID']?>">Solicitar Amizade</a>
								<?php }else{ ?>
									<a href="javascript:void(0)" style="color: #8b008b; border: 0;">Solicitação pendente</a>
								<?php } ?>
							</div>
						</div>
					</div>

					<?php } ?>

				</div>	<!-- Fim Comunidade -->
		</div> <!-- Fim Feed -->
	</section>

</body>
</html>