<?php require RUTA_RESOURCE . '/views/includes/header.php' ?>

<table class="table">

    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach($datos['usuarios'] as $usuario): ?>
        
            <tr>
                <td><?php echo $usuario->id_usuario; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
                <td><?php echo $usuario->email; ?></td>
                <td><?php echo $usuario->telefono; ?></td>
                <td>
                    <a class="mr-2"href="<?php echo RUTA_URL;?>/inicio/editar?id_usuario=<?php echo $usuario->id_usuario;?>">Editar</a>
                    <a href="<?php echo RUTA_URL;?>/inicio/borrar?id_usuario=<?php echo $usuario->id_usuario;?>">Borrar</a>
                </td>
            </tr>

        <?php endforeach ?>

    </tbody>

</table>

</div>
<?php require RUTA_RESOURCE . '/views/includes/footer.php' ?>
