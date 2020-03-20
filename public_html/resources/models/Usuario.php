<?php

    class Usuario{

        private $db;

        public function __construct(){

            $this->db = new Base;

        }

        public function ObtenerUsuarios(){

            $this->db->query("Select *from usuarios");

            $resultados = $this->db->registros();

            return $resultados;


        }

        public function obtenerUsuario($id){

            $this->db->query("Select *from usuarios where id_usuario = :id");

            $this->db->bind(':id',$id);

            $resultado = $this->db->registro();

            return $resultado;

        }

        public function agregarUsuario($datos){

            $this->db->query("Insert into usuarios (nombre,email,telefono) values (:nombre, :email, :telefono)");

            $this->db->bind(':nombre',$datos["nombre"]);
            $this->db->bind(':email',$datos["email"]);
            $this->db->bind(':telefono',$datos["telefono"]);

            if($this->db->execute()){

                return true;

            }else{

                return false;
            }

        }

        public function editarUsuario($datos){

            $this->db->query("Update usuarios set nombre = :nombre, email = :email, telefono = :telefono where id_usuario = :id");
            
            $this->db->bind(':id',$datos["id_usuario"]);
            $this->db->bind(':nombre',$datos["nombre"]);
            $this->db->bind(':email',$datos["email"]);
            $this->db->bind(':telefono',$datos["telefono"]);

            if($this->db->execute()){

                return true;

            }else{

                return false;
            }
            
        }

        public function borrarUsuario($datos){

            $this->db->query("Delete from usuarios where id_usuario = :id");
            
            $this->db->bind(':id',$datos["id_usuario"]);

            if($this->db->execute()){

                return true;

            }else{

                return false;
            }
            
        }

        

    }


?>