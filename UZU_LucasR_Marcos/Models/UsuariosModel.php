<?php
    namespace UZU_LucasR_Marcos\Models;

    class UsuariosModel{

        public static function emailExists($email){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();
            $verificar = $pdo->prepare("Select email From usuarios Where email = ?"); //Procurar Usuário com mesmo E-mail
            $verificar->execute(array($email));

            if ($verificar->rowCount() == 1){ //Verificar existência E-mail (Se existir)
                return true;
            }else{
                return false;
            }
        }

        public static function listarComunidade(){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();

            $comunidade  = $pdo->prepare("Select * From Usuarios");
            $comunidade->execute();

            return $comunidade->fetchAll();
        }

        public static function solicitarAmizade($idPara){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();

            $verificaAmizade = $pdo->prepare("Select * From Amizades Where (Enviou = ? And Recebeu = ?) Or (Enviou = ? And Recebeu = ?)");
            $verificaAmizade->execute(array($_SESSION['id'], $idPara, $idPara, $_SESSION['id']));

            if ($verificaAmizade->rowCount() == 1){
                return false;
            }else{
                $insertAmizade = $pdo->prepare("Insert Into Amizades Values(null, ?, ?, 0)");
                if ($insertAmizade->execute(array($_SESSION['id'], $idPara))){
                    return true;
                }
            }
            
            return true;
        }
        
        public static function existePedidoAmizade($idPara){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();

            $verificaAmizade = $pdo->prepare("Select * From Amizades Where (Enviou = ? And Recebeu = ?) Or (Enviou = ? And Recebeu = ?)");
            $verificaAmizade->execute(array($_SESSION['id'], $idPara, $idPara, $_SESSION['id']));

            if ($verificaAmizade->rowCount() == 1){
                return false;
            }else{
                return true;
            }
        }
    }
?>