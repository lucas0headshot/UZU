<?php
    namespace UZU_LucasR_Marcos\Controllers;

    class PerfilController{

        public function index(){

            if(isset($_SESSION['login'])){ //Verificar se está logado
                \UZU_LucasR_Marcos\Views\MainView::Render('Perfil'); //Renderizar Perfil
            }else{
                \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH); //Renderizar Login
            }
        }
    }
?>