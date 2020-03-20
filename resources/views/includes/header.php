<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title><?php echo NOMBRE_SITIO; ?></title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top p-1">

        <div class="container">
        
        <a class="navbar-brand" href="<?php echo RUTA_URL;?>"><?php echo NOMBRE_SITIO;?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            
            <form class="d-inline w-50 ml-auto p-1">
                <div class="input-group">
                    <input type="text" class="form-control border border-right-0" placeholder="Buscar producto o servicio...">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary bg-light border border-left-0" type="button">
                            <i class="fa fa-search"></i>
                            
                        </button>
                    </span>
                </div>
            </form>
            
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item <?php echo $datos['estado'] == 'inicio' ? 'active': '' ?>">
                    <a class="nav-link" href="<?php echo RUTA_URL;?>"><i class="fas fa-home"></i> Inicio</a>
                    
                </li>
                <li class="nav-item <?php echo $datos['estado'] == 'agregar' ? 'active': '' ?>">
                    <a class="nav-link" href="<?php echo RUTA_URL;?>/inicio/agregar">Agregar</a>
                </li>
                <li class="nav-item <?php echo $datos['estado'] == 'nosotros' ? 'active': '' ?>">
                    <a class="nav-link" href="<?php echo RUTA_URL;?>/inicio/nosotros">Nosotros</a>
                </li>

                <li class="nav-item <?php echo $datos['estado'] == 'login' ? 'active': '' ?>">
                    <a class="nav-link" href="<?php echo RUTA_URL;?>"><i class="fas fa-address-book"></i> Registrarse</a>
                </li>

                <li class="nav-item <?php echo $datos['estado'] == 'login' ? 'active': '' ?>">
                    <a class="nav-link" href="<?php echo RUTA_URL;?>"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
 
                <?php 

                    if($_SESSION['usuario_id']!=null){

                        echo '<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Darwinpz</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item">Perfil</a>
                                    <a class="dropdown-item">Compras</a>
                                    <a class="dropdown-item" >Cerrar Sesión</a>
                                </div>
                            </li>';
                    }
                
                ?>
                
            </ul>

        </div>
        </div>
    </nav>

    <div class="container mt-5 pt-3 mb-3">