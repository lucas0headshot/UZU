<?php
    namespace UZU_rs;

    class Application{
        private $controller;

        private function setApp(){
            $loadname = 'UZU_rs\Controllers\\';
            $url = explode('/',$_GET['url']);

            if ($url[0] == ''){
                $loadname.= 'Home';
            }else{
                $loadname.=ucfirst(strtolower($url[0]));
            }
            $loadname.= 'Controller';

            $this->controller = new $loadname();
        }

        public function run(){
            $this->setApp();
            $this->controller->index();
        }
    }
?>  