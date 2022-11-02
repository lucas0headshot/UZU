<?php
    namespace UZU_LucasR_Marcos\Controllers;

    class ComunidadeController{

        public function index(){

            if(isset($_SESSION['login'])){
                \UZU_LucasR_Marcos\Views\MainView::Render('Comunidade'); //Renderizar Comunidade
            }else{
                \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH); //Renderizar Login
            }
        }
    }
?>