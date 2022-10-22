<?php
    namespace UZU_LucasR_Marcos\Controllers;

    class HomeController{

        public function index(){
            //echo 'Estamos na home!'; //Teste
            if(isset($_SESSION['login'])){
                \UZU_LucasR_Marcos\Views\MainView::Render('Home'); //Renderizar Home
            }else{
                \UZU_LucasR_Marcos\Views\MainView::Render('Registrar'); //Renderizar Criar Conta
            }
        }
    }
?>