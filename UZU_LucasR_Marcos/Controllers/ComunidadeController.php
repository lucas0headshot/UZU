<?php
    namespace UZU_LucasR_Marcos\Controllers;

    class ComunidadeController{

        public function index(){

            echo 'ComunidadeController';

            if(isset($_SESSION['login'])){

                if (isset($_GET['solicitarAmizade'])){
                    $idPara = (int) $_GET['solicitarAmizade'];
                    if (\UZU_LucasR_Marcos\Models\UsuariosModel::solicitarAmizade($idPara)){
                        \UZU_LucasR_Marcos\Utilidades::alerta('Amizade solicitada!');
                        \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Comunidade');
                    }else{
                        \UZU_LucasR_Marcos\Utilidades::alerta('Ops... ocorreu um erro, tente novamente mais tarde');
                        \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Comunidade');
                    }
                }

                \UZU_LucasR_Marcos\Views\MainView::Render('Comunidade'); //Renderizar Comunidade
            }else{
                \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH); //Renderizar Login
            }
        }
    }
?>