<?php
	session_start(); //Iniciar sessão
	require('vendor/autoload.php'); //Usar Composer
	
	$app = new UZU_LucasR_Marcos\Application(); //Rodar Aplicação
	$app->Run();
?>