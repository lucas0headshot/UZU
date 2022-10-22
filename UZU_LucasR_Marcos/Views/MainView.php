<?php
    namespace UZU_LucasR_Marcos\Views;

    class MainView{
        public static function Render($fileName){
            include('Pages/'.$fileName.'.php');
        }
    }
?>