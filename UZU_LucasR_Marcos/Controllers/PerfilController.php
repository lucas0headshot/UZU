<?php
    namespace UZU_LucasR_Marcos\Controllers;

    class PerfilController{

        public function index(){

            echo 'PerfilController';

            if(isset($_SESSION['login'])){ //Verificar se está logado

                if (isset($_POST['excluir'])){ //Excluir conta
                    $ID = (int) $_SESSION['id'];
                    var_dump($ID);

                    if ($ID == $_SESSION['id']){ //Se o ID for igual ao da Session
                        $pdo = \UZU_LucasR_Marcos\SQL::connect();
                        $excluir = $pdo->prepare("Delete from usuarios where ID = ?");
                        $excluir->execute(array($ID));
                        session_unset();
                        session_destroy();
                        \UZU_LucasR_Marcos\Utilidades::alerta('Conta excluída :(!');
                        \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH);
                    }else{
                        \UZU_LucasR_Marcos\Utilidades::alerta('Algo deu errado!');
                        \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Perfil');
                    }
                }

                if (isset($_POST['atualizar'])){
                    $pdo = \UZU_LucasR_Marcos\SQL::connect();
                    $nome = strip_tags($_POST['Nome']);
                    $senha = $_POST['Senha'];

                    if ($nome == '' || strlen($nome) < 2){ //Se Nome for vazio ou menor que 3 caracteres
                        \UZU_LucasR_Marcos\Utilidades::alerta('Nome inválido!');
                        \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Perfil');
                    }

                    if ($senha != ''){ //Se Senha não estiver vazia
                        $senha = \UZU_LucasR_Marcos\Bcrypt::hash($senha);
                        $atualizar = $pdo->prepare("Update Usuarios Set Nome = ?, Senha = ? Where ID = ?");
                        $atualizar->execute(array($nome, $senha, $_SESSION['id']));
                        $_SESSION['Nome'] = $nome;
                    }else{
                        $atualizar = $pdo->prepare("Update Usuarios Set Nome = ? Where ID = ?");
                        $atualizar->execute(array($nome, $_SESSION['id']));
                        $_SESSION['Nome'] = $nome;
                    }


                    if ($_FILES['file']['tmp_name'] != ''){ //Verificar se há arquivo para upload
                        $file = $_FILES['file'];
                        $fileExt = explode('.', $file['name']);
                        $fileExt = $fileExt[count($fileExt) - 1];
                        if ($fileExt == 'png' || $fileExt == 'jpg' || $fileExt == 'jpeg'){ //Verificar extensão
                            $size = intval($file['size'] / 1024); //Converter para Kb
                            if ($size <= 500){ //Se tamanho for inferior ou igual a 500Kb
                                $uniqid = uniqid().'.'.$fileExt;
                                $atualizaImagem = $pdo->prepare("Update Usuarios Set Img = ? Where ID = ?");
                                $atualizaImagem->execute(array($uniqid, $_SESSION['id']));
                                move_uploaded_file($file['tmp_name'], 'C:\wamp64\www\UZU/Uploads/'.$uniqid);
                                $_SESSION['Img'] = $uniqid;
                                \UZU_LucasR_Marcos\Utilidades::alerta('Perfil e foto atualizadas!');
                                \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Perfil');
                            }else{
                                \UZU_LucasR_Marcos\Utilidades::alerta('Imagem incompatível!');
                                \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Perfil');
                            }
                        }else{
                            \UZU_LucasR_Marcos\Utilidades::alerta('Imagem incompatível!');
                            \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Perfil');
                        }
                    }

                    \UZU_LucasR_Marcos\Utilidades::alerta('Perfil atualizado!');
                    \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH.'Perfil');

                }

                \UZU_LucasR_Marcos\Views\MainView::Render('Perfil'); //Renderizar Perfil
            }else{
                \UZU_LucasR_Marcos\Utilidades::redirect(INCLUDE_PATH); //Renderizar Login
            }
        }
    }
?>