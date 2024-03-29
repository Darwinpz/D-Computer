<?php

    //Clase para conectarse a la BD y ejecutar consultas
    class Base{

        private $host = DB_HOST;
        private $usuario = DB_USUARIO;
        private $password = DB_PASSWORD;
        private $db = DB_NOMBRE;

        private $dbh; //database handler
        private $stmt; //statement
        private $error;

        public function __construct(){

            $dsn = 'mysql:host='.$this->host.'; dbname='.$this->db;

            $opciones = array(

                PDO::ATTR_PERSISTENT =>true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

            );
            
            //crear instancia de pdo

            try {
                
                $this->dbh = new PDO($dsn,$this->usuario,$this->password,$opciones);

                $this->dbh->exec('set names utf8');
                
            } catch (PDOException $e) {

                $this->error = $e->getMessage();

                echo $this->error;
                
            }

        }

        //Preparamos la consulta
        public function query($sql){

            $this->stmt = $this->dbh->prepare($sql);

            
        }

        //Vincular la consulta con bind
        public function bind($parametro,$valor,$tipo=null){
            
            if(is_null($tipo)){

                switch (true) {
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                        break;

                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                        break;

                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                        break;

                    default:
                        $tipo = PDO::PARAM_STR;
                        break;
                }

            }

            $this->stmt->bindValue($parametro,$valor,$tipo);

        }

        //Ejecuta la consulta
        public function execute(){

            return $this->stmt->execute();

        }

        //Obtener Registros
        Public function registros(){

            $this->execute();

            return $this->stmt->fetchAll(PDO::FETCH_OBJ);

        }

        //Obtener un Solo registro
        Public function registro(){

            $this->execute();

            return $this->stmt->fetch(PDO::FETCH_OBJ);

        }

        //Obtener un Cantidad de registros
        Public function rowCount(){

            return $this->stmt->rowCount();

        }

    }


?>