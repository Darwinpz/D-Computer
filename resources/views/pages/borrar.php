<?php require RUTA_RESOURCE . '/views/includes/header.php' ?>

<div class="container mt-3">

<div class="card card-body">

    <h2>Borrar Usuario</h2>

    <form action="<?php echo RUTA_URL;?>/paginas/borrar?id_usuario=<?php echo $datos['id_usuario']?>" method="POST">

        <div class="form-group">

            <input type="text" name="nombre" class="form-control"  placeholder="nombre" value="<?php echo $datos['nombre']?>">
        
        </div>

        <div class="form-group">

            <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $datos['email']?>">
        
        </div>

        <div class="form-group">

            <input type="text" name="telefono" class="form-control"  placeholder="telefono" value="<?php echo $datos['telefono']?>">
        
        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-danger">Borrar</button>
        
        </div>

    </form>

</div>
</div>

<?php require RUTA_RESOURCE . '/views/includes/footer.php' ?>
