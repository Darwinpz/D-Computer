<?php


    class Usuario extends Controlador{


        public function __construct(){

            
        }

        public function index(){
        
            redireccionar('/inicio');

        }

        public function perfil(){


            $this->vista("pages/usuarios/perfil");

        }

        public function registrarse(){

            $datos = [
                'estado' => 'registrarse'
            ];

            $this->vista("pages/usuarios/registrarse",$datos);

        }

        public function ingresar(){

            $datos = [
                'estado' => 'ingresar'
            ];

            $this->vista("pages/usuarios/ingresar",$datos);

        }

        public function salir(){

            $this->vista("pages/usuarios/salir");

        }
        

    }



?>