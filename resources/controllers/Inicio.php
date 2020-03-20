<?php

    class Inicio extends Controlador{

        public function __construct(){

            $this->usuarioModelo = $this->modelo("Usuario");
            
        }

        public function index(){
        
            $usuarios = $this->usuarioModelo->ObtenerUsuarios();

            $datos = [

                'usuarios' => $usuarios,
                'estado' => 'inicio'
            ];

            $this->vista("pages/inicio",$datos);

        }

        public function nosotros(){
            
            $datos = [
                'estado' => 'nosotros'
            ];

            $this->vista("pages/nosotros",$datos);

        }

        public function agregar(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $datos = [

                    'nombre' => trim($_POST["nombre"]),
                    'email' => trim($_POST["email"]),
                    'telefono' => trim($_POST["telefono"])
                    
                ];

                if($this->usuarioModelo->agregarUsuario($datos))
                {

                    redireccionar('/inicio');

                }else{

                    die("Algo salió mal");

                }

            }else{

                $datos = [

                    'nombre' => '',
                    'email' => '',
                    'telefono' => '',
                    'estado' => 'agregar'
                    
                ];

                $this->vista('pages/agregar',$datos);

            }

        }

        public function editar(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                if(isset($_GET['id_usuario'])){

                    $id = $_GET['id_usuario'];

                    $datos = [
                        'id_usuario' =>$id,
                        'nombre' => trim($_POST["nombre"]),
                        'email' => trim($_POST["email"]),
                        'telefono' => trim($_POST["telefono"])
                        
                    ];

                    if($this->usuarioModelo->editarUsuario($datos))
                    {
    
                        redireccionar('/inicio');
    
                    }else{
    
                        die("Algo salió mal");
    
                    }


                }else{

                    die("faltan parametros");
                }

            }else{
                
                if(isset($_GET['id_usuario'])){

                    $id = $_GET['id_usuario'];

                    $usuario = $this->usuarioModelo->obtenerUsuario($id);

                    if($usuario != null){

                        $datos = [

                            'id_usuario' => $usuario->id_usuario,
                            'nombre' => $usuario->nombre,
                            'email' => $usuario->email,
                            'telefono' => $usuario->telefono
                            
                        ];
    
                        $this->vista('pages/editar',$datos);

                    }else{

                        redireccionar('/inicio');

                    }


                }else{

                    die("faltan parametros");

                }
                                
            }
        
        }


        public function borrar(){

            if(isset($_GET['id_usuario'])){

                $id = $_GET['id_usuario'];

                $usuario = $this->usuarioModelo->obtenerUsuario($id);
               
                if($usuario != null){

                    $datos = [

                        'id_usuario' => $usuario->id_usuario,
                        'nombre' => $usuario->nombre,
                        'email' => $usuario->email,
                        'telefono' => $usuario->telefono
                            
                    ];

                    if($_SERVER['REQUEST_METHOD'] == 'POST'){

                        $datos = [
                            'id_usuario' =>$id
                            
                        ];
        
                        if($this->usuarioModelo->borrarUsuario($datos))
                        {
                            redireccionar('/inicio');
        
                        }else{
        
                            die("Algo salió mal");
        
                        }
        
                    }
        
                    $this->vista('pages/borrar',$datos);
                }else{

                    redireccionar('/inicio');

                }

            }else{

                die("faltan parametros");
            }
            
            
        
        }

    }



?>