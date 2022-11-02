<?php
	session_start(); //Iniciar sessão
	date_default_timezone_set('America/Sao_Paulo');

	require('vendor/autoload.php'); //Usar Composer
	
	define('INCLUDE_PATH_STATIC','http://localhost/UZU/UZU_LucasR_Marcos/Views/Pages/');
	define('INCLUDE_PATH','http://localhost/UZU/');
	
	$app = new UZU_LucasR_Marcos\Application(); //Rodar Aplicação
	$app->Run();
?>