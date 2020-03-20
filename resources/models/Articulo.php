<?php

    class Articulo{

        private $db;

        public function __construct(){

            $this->db = new Base;
            
        }

        public function ObtenerArticulos(){

            $this->db->query("Select *from articulos");

            return $this->db->registros();

        }

    }



?>