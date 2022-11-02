<?php
    namespace UZU_LucasR_Marcos\Models;

    class HomeModel{

        public static function postFeed($post){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();
            $post = strip_tags($post);
            //Fazer link de imagem através da tag

            $postFeed = $pdo->prepare("Insert Into Posts Values (null, ?, ?, ?)"); //Inserir no Posts (ID, Usuario_ID, Post, Data e hora)
            $postFeed->execute(array($_SESSION['id'], $post, date('Y-m-d H:i:s', time())));

            $atualizaUsuario = $pdo->prepare("Update Usuarios Set Ultimo_Post = ? Where ID = ?"); //Autualizar último post do Usuário
            $atualizaUsuario->execute(array(date('Y-m-d H:i:s', time()), $_SESSION['id']));

        }
    }

?>