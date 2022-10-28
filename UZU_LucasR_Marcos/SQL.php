<?php
    namespace UZU_LucasR_Marcos;

use Exception;

    class SQL{

        private static $pdo;

        public static function connect(){
            if (self::$pdo == null){
                try{
                    self::$pdo = new \PDO('mysql:host=localhost;dbname=UZU','root','',array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
                }catch(Exception $e){
                    echo 'Erro ao conectar-se com MySQL!';
                    error_log($e->getMessage());
                }
            }
            return self::$pdo;
        }
    }
?>