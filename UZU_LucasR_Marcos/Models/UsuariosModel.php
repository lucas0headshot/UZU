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

            $comunidade  = $pdo->prepare("Select * From Usuarios"); //Selecionar todos Usuarios
            $comunidade->execute();

            return $comunidade->fetchAll();
        }

        public static function solicitarAmizade($idPara){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();

            $verificaAmizade = $pdo->prepare("Select * From Amizades Where (Enviou = ? And Recebeu = ?) Or (Enviou = ? And Recebeu = ?)");
            $verificaAmizade->execute(array($_SESSION['id'], $idPara, $idPara, $_SESSION['id'])) ;

            if ($verificaAmizade->rowCount() == 1){ //Se amizade já existir
                return false;
            }else{
                $insertAmizade = $pdo->prepare("Insert Into Amizades Values(null, ?, ?, 0)"); //Inserir na tabela Amizades (ID, Enviou, Recebeu, Status)
                if ($insertAmizade->execute(array($_SESSION['id'], $idPara))){
                    return true;
                }
            }
            
            return true;
        }
        
        public static function listarAmizadesPendentes(){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();

            $listarAmizadesPendentes = $pdo->prepare("Select * From Amizades Where Recebeu = ? And Status = 0");
            $listarAmizadesPendentes->execute(array($_SESSION['id']));

            return $listarAmizadesPendentes->fetchAll();
        }

        public static function getUsuarioByID($ID){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();

            $usuario = $pdo->prepare("Select * From Usuarios Where ID = ?");
            $usuario->execute(array($ID));

            return $usuario->fetch();
        }

        public static function existePedidoAmizade($idPara){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();

            $verificaAmizade = $pdo->prepare("Select * From Amizades Where (Enviou = ? And Recebeu = ?) Or (Enviou = ? And Recebeu = ?)"); //Verificar amizade
            $verificaAmizade->execute(array($_SESSION['id'], $idPara, $idPara, $_SESSION['id']));

            if ($verificaAmizade->rowCount() == 1){
                return false;
            }else{
                return true;
            }
        }

        public static function atualizarPedidoAmizade($enviou, $status){
            if ($status == 0){
                $pdo = \UZU_LucasR_Marcos\SQL::connect();
                $del = $pdo->prepare("Delete From Amizades Where Enviou = ? And Recebeu = ? And Status = 0");
                $del->execute(array($enviou, $_SESSION['id']));
            }else if ($status == 1){
                $pdo = \UZU_LucasR_Marcos\SQL::connect();
                $aceitarPedido = $pdo->prepare("Update Amizades Set Status = 1 Where Enviou = ? And Recebeu = ?");
                $aceitarPedido->execute(array($enviou, $_SESSION['id']));
                
                if ($aceitarPedido->rowCount() == 1){
                    return true;
                }else{
                    return false;
                }
            }
        }

        public static function listarAmigos(){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();
            $amizades = $pdo->prepare("Select * From Amizades Where (Enviou = ? And Status = 1) Or (Recebeu = ? And Status = 1)");
            $amizades->execute(array($_SESSION['id'], $_SESSION['id']));

            $amizades = $amizades->fetchAll();
            $amigosConfirmados = array();
            foreach($amizades as $key=> $value){
                if ($value['Enviou'] == $_SESSION['id']){
                    $amigosConfirmados[] = $value['Recebeu'];
                }else{
                    $amigosConfirmados[] = $value['Enviou'];
                }
            }

            $listaAmigos = array();
            foreach($amigosConfirmados as $key=> $value){
                $listaAmigos[$key]['Nome'] = self::getUsuarioByID($value)['Nome'];
                $listaAmigos[$key]['Email'] = self::getUsuarioByID($value)['Email'];
                $listaAmigos[$key]['Img'] = self::getUsuarioByID($value)['Img'];
            }

            return $listaAmigos;
        }

    }
?>