<?php
	session_start(); //Iniciar sessão
	require('vendor/autoload.php'); //Usar Composer
	
	define('INCLUDE_PATH_STATIC','http://localhost/UZU/UZU_LucasR_Marcos/Views/Pages/');
	define('INCLUDE_PATH','http://localhost/UZU/UZU_LucasR_Marcos/');
	$app = new UZU_LucasR_Marcos\Application(); //Rodar Aplicação
	$app->Run();
?>