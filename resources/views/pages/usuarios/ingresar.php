<?php require RUTA_RESOURCE . '/views/includes/header.php' ?>

<div class="row">

    <div class="col-md-4 mx-auto">

        <div class="card mt-4 text-center">

            <div class="card-header">

                <h4>Ingresar al sistema</h4>
            </div>

            <img src="/img/d-computer.ico" class="rounded-circle mx-auto d-block m-2 w-50" alt="logo">

            <h3>D-computer</h3>

            <div class="card-body">

                <form action="" method="POST">

                    <div class="form-group">

                        <input type="email" class="form-control" name="email" placeholder="Email" autofocus>

                    </div>
                    <div class="form-group">

                        <input type="password" class="form-control" name="password" placeholder="Contraseña">

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        
                    </div>

                </form>

                <a class="nav-link" href="<?php echo RUTA_URL;?>/inicio/agregar">Olvidé la contraseña</a>
                    
            </div>

        </div>

    </div>

</div>

<?php require RUTA_RESOURCE . '/views/includes/footer.php' ?>