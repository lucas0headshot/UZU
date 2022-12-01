<?php
    namespace UZU_LucasR_Marcos\Controllers;

    class verPerfilController{

        public function index(){

            echo 'verPerfilController';

            if(isset($_SESSION['login'])){

                if (isset($_GET['verPerfil'])){
                    $ID = (int) $_GET['ID'];
                    \UZU_LucasR_Marcos\Views\MainView::Render('VerPerfil');
                    echo $ID;
                }else{
                    echo 'Erro...';
                }
            }else{
                \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH); //Renderizar Login
            }
        }
    }
?>