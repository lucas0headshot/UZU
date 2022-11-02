<?php
    namespace UZU_LucasR_Marcos\Controllers;

    class HomeController{

        public function index(){

            if (isset($_GET['logout'])){
                session_unset();
                session_destroy();

                \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH);
            }

            if(isset($_SESSION['login'])){
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