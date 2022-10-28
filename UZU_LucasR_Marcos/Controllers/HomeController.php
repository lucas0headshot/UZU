<?php
    namespace UZU_LucasR_Marcos\Controllers;

    class HomeController{

        public function index(){
            if(isset($_SESSION['login'])){
                \UZU_LucasR_Marcos\Views\MainView::Render('Home'); //Renderizar Home
            }else{
                \UZU_LucasR_Marcos\Views\MainView::Render('Login'); //Renderizar Login
            }
        }
    }
?>