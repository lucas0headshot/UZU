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
    }
?>