<?php
    namespace UZU_LucasR_Marcos;

    class Utilidades{
        
        public static function redirect($url){ //Redirecionar
            echo '<script>window.location.hrer="'.$url.'"</script>';
            die(); //Se ativado não redireciona pro $url
        }

        public static function alerta($Mensagem){ //Mensagem - Alerta
            echo '<script>alert("'.$Mensagem.'")</script>';
        }
    }
?>