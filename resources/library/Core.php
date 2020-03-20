<?php

    /* mapear la url ingresada en el navegador

    1-controlador
    2-metodo
    3-parametro

    */

    class Core{

        protected $controladorActual = 'Inicio';
        protected $metodoActual = 'index';
        //protected $parametros = [];

        //constructor
        public function __construct(){

            $url = $this->getUrl();
            
            
            if($url !=null){

                //pregunta si existe la url en los controladores
                if(file_exists('../resources/controllers/'.ucwords($url[0]).'.php'))
                {
                    
                    $this->controladorActual = ucwords($url[0]);

                    unset($url[0]);
                    
                }


            }

            //requerir el controlador
            require_once '../resources/controllers/'.$this->controladorActual.'.php';

            $this->controladorActual = new $this->controladorActual;
            
            //obtener el metodo
            if($url !=null){    
                
                if(isset($url[1])){

                    if(method_exists($this->controladorActual,$url[1])){

                        //verificamos metodo
                        $this->metodoActual = $url[1];

                        unset($url[1]);

                    }

                }

                //echo $this->metodoActual;
            }

            
            //obtener parametros

            //$this->parametros = $url ? array_values($url) : [];

            //llamar callback con parametros array

            //call_user_func_array([$this->controladorActual,$this->metodoActual],$this->parametros);

            call_user_func([$this->controladorActual,$this->metodoActual]);


        }

        public function getUrl(){

            if(isset($_GET['url'])){
                
                $url = rtrim($_GET['url'],'/');
                
                $url = filter_var($url,FILTER_SANITIZE_URL);

                $url = explode('/',$url);
                
                return $url;
                
            }

        }

    }

?>