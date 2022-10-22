<?php
    namespace UZU_LucasR_Marcos\Views;

    class MainView{
        public static function Render($filename){
            include('Pages/'.$filename.'.php');
        }
    }
?>