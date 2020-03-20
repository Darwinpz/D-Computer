<?php require RUTA_RESOURCE . '/views/includes/header.php' ?>

<div class="row">

    <div class="col-md-4 mx-auto">

        <div class="card mt-4 text-center">

            <div class="card-header">

                <h4> Registro de Usuario</h4>

            </div>

            <div class="card-body">

                <form action="" method="POST">

                    <div class="form-group">

                        <input type="text" class="form-control" name="nombre" placeholder="Nombres">

                    </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="nombre" placeholder="Apellidos">

                    </div>

                    <div class="form-group">

                        <input type="email" class="form-control" name="correo" placeholder="Correo electrónico">

                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" name="password" placeholder="Contraseña">

                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirmar la contraseña" >

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary btn-block">Registarse</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php require RUTA_RESOURCE . '/views/includes/footer.php' ?>