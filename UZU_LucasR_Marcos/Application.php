<?php
    namespace UZU_LucasR_Marcos;
    
    class Application{  //Aplicação
        
        private $controller; //Controlador
        
        private function setApp(){
            $loadName = 'UZU_LucasR_Marcos\Controllers\\';
            $url = explode('/',@$_GET['url']);

            if ($url[0] == ''){ //Se estiver vazio
                $loadName.= 'Home';
            }else{
                $loadName.= ucfirst(strtolower($url[0]));
            }

            $loadName.= 'Controller';
            
            if (file_exists($loadName.'.php')){ //Verificar arquivo atual
                $this->controller = new $loadName();
            }else{
                require('Views\\Pages\\404.php'); //Erro 404 personalizado
                die; //Encerrar App
            }

            $this->controller = new $loadName();

        }
        public function Run(){
            $this->setApp();
            $this->controller->index();
        }
    }
?>