<?php
    namespace UZU_LucasR_Marcos\Controllers;

    class HomeController{

        public function index(){

            echo 'HomeController';

            if (isset($_GET['logout'])){ //Verificar se Usuário optou por Logout
                session_unset();
                session_destroy();

                \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH); //Redirecionar pro Login
            }

            if(isset($_SESSION['login'])){ //Verificar se está logado

                if (isset($_GET['recusarAmizade'])){
                    $idEnviou = (int)  $_GET['recusarAmizade'];
                    \UZU_LucasR_Marcos\Models\UsuariosModel::atualizarPedidoAmizade($idEnviou,0);
                    \UZU_LucasR_Marcos\Utilidades::alerta('Amizade recusada...');
                    \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH);
                }else if (isset($_GET['aceitarAmizade'])){
                    $idEnviou = (int)  $_GET['aceitarAmizade'];
                    if (\UZU_LucasR_Marcos\Models\UsuariosModel::atualizarPedidoAmizade($idEnviou,1)){
                        \UZU_LucasR_Marcos\Utilidades::alerta('Amizade aceita!');
                        \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH);
                    }else{
                        \UZU_LucasR_Marcos\Utilidades::alerta('Ops... ocorreu um erro, tente novamente mais tarde');
                        \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH);
                    }
                }

                if (isset($_POST['post_feed'])){ //Existe postagem?
                    
                    if ($_POST['post_content'] == ''){
                        \UZU_LucasR_Marcos\Utilidades::alerta('Seu post está vazio...');
                        \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH);
                    }
                
                    \UZU_LucasR_Marcos\Models\HomeModel::postFeed($_POST['post_content']);
                    \UZU_LucasR_Marcos\Utilidades::alerta('Post realizado!');
                    \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH);
                }

                \UZU_LucasR_Marcos\Views\MainView::Render('Home'); //Renderizar Home
            }else{

                if (isset($_POST['login'])){ //Ação login
                    $login =  $_POST['Email'];
                    $senha = $_POST['Senha'];

                    $verifica = \UZU_LucasR_Marcos\SQL::connect()->prepare("Select * From Usuarios Where email = ?");
                    $verifica->execute(array($login));

                    if ($verifica->rowCount() == 0){ //Verificar Senha no Banco de Dados
                        \UZU_LucasR_Marcos\Utilidades::alerta('E-mail não cadastrado!'); //Não existe
                        \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH);
                    }else{
                        $dados = $verifica->fetch();
                        $senhaBanco = $dados['Senha'];
                        if (\UZU_LucasR_Marcos\Bcrypt::check($senha,$senhaBanco)){
                            $_SESSION['login'] = $dados['Email']; //Login efetudado com sucesso(Senha condizente)
                            $_SESSION['id'] = $dados['ID'];
                            $_SESSION['Nome'] = explode(' ', $dados['Nome'])[0];
                            $_SESSION['Img'] = $dados['Img'];
                            \UZU_LucasR_Marcos\Utilidades::alerta('Bem-vindo a UZU!');
                            \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH);
                        }else{
                            \UZU_LucasR_Marcos\Utilidades::alerta('Senha incorreta!');
                            \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH);
                        }
                    }
                }
                \UZU_LucasR_Marcos\Views\MainView::Render('Login'); //Renderizar Login
            }
        }
    }
?>