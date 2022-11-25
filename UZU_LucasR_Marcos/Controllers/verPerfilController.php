<?php
    namespace UZU_LucasR_Marcos\Controllers;

    class verPerfilController{

        public function index(){

            echo 'verPerfilController';

            if(isset($_SESSION['login'])){

                if (isset($_GET['verPerfil'])){
                    \UZU_LucasR_Marcos\Views\MainView::Render('VerPerfil');
                }else{
                    echo 'Erro...';
                }
            }else{
                \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH); //Renderizar Login
            }
        }
    }
?>