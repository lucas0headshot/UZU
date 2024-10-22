<?php
    namespace UZU_LucasR_Marcos\Controllers;

    class RegistrarController{

        public function index(){

            if (isset($_POST['registrar'])){
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $senhaRepetida = $_POST['senhaRepetida'];

                if (!filter_var($email,FILTER_VALIDATE_EMAIL)){ //Validar E-mail (Se não for válido)
                    \UZU_LucasR_Marcos\Utilidades::alerta('E-mail inválido!');
                    \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Registrar');
                }else if (strlen($nome) < 3){
                    \UZU_LucasR_Marcos\Utilidades::alerta('Seu nome é muito curto!');
                    \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Registrar');
                }else if (strlen($senha) < 6){ //Verificar senha (Se for menor que 6 caracteres)
                    \UZU_LucasR_Marcos\Utilidades::alerta('Sua senha é muito curta!');
                    \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Registrar');
                }else if ($senhaRepetida != $senha){
                    \UZU_LucasR_Marcos\Utilidades::alerta('Suas senhas não são iguais!');
                }else if (\UZU_LucasR_Marcos\Models\UsuariosModel::emailExists($email)){ //Verificar existência E-mail (Se já existir cadastrado)
                    \UZU_LucasR_Marcos\Utilidades::alerta('E-mail já cadastrado!');
                    \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Registrar');
                }else{
                    $senha = \UZU_LucasR_Marcos\Bcrypt::hash($senha); //Criptografar senha
                    $registro = \UZU_LucasR_Marcos\SQL::connect()->prepare("Insert Into Usuarios VALUES (null, ?, ?, ?, '0000-00-00 00:00:00', '')"); //Insert anti-Injection
                    $registro->execute(array($nome, $email, $senha));

                    \UZU_LucasR_Marcos\Utilidades::alerta('Registrado com sucesso!');
                    \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH); //Redirecionar pro Login
                }
            }
            \UZU_LucasR_Marcos\Views\MainView::Render('Registrar'); //Renderizar Registrar
        }
    }
?>