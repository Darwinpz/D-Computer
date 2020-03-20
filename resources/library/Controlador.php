<?php

    //se encarga de poder cargar los modelos y las vistas
    class Controlador{

        //cargar modelo
        public function modelo($modelo){

            require_once '../resources/models/' . $modelo . '.php';

            return new $modelo();

        }

        //cargar vista
        public function vista($vista,$datos=[]){

            if(file_exists('../resources/views/' . $vista . '.php')){

                require_once '../resources/views/' . $vista . '.php';

            }else{

                die('La vista no existe');

            }

        }



    }



?>