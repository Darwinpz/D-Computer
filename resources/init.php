<?php

    //session

    session_start();

    $_SESSION['usuario_id'] = null;
    $_SESSION['usuario_nombre'] = null;
    $_SESSION['usuario_correo'] = null;

    //cargar librerias

    require_once 'configs/config.php';
    
    require_once 'helpers/url_helper.php';
        
    //AutoLoad de librerias php
    spl_autoload_register(function($nombreClase){

        require_once 'library/' .$nombreClase. '.php';

    });

?>