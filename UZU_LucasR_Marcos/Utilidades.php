<?php
    namespace UZU_LucasR_Marcos;

    class Utilidades{
        
        public static function redirect($url){ //Redirecionar
            echo '<script>window.location.href="'.$url.'"</script>';
            die();
        }

        public static function alerta($Mensagem){ //Mensagem - Alerta
            echo '<script>alert("'.$Mensagem.'")</script>';
        }
    }
?>