<?php
require_once("db.php");
header("content-type: application/xls");
header("content-disposition: attachment; filename = reporte.xls");
?>

<table class="table table-striped table-dark" id="table_id">

<thead>
    <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Fecha</th>
        <th>Contrasena</th>
        <th>Rol</th>
    </tr>
</thead>
<tbody>
    <?php 
        include('./db.php');
        $sql = "select *, usuarios.id, permisos.rol 
        from usuarios 
        left join permisos 
        on usuarios.rol = permisos.id";
        $dato = $mysqli->query($sql);

        if ($dato -> num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {
    ?>

    <tr>
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['correo']; ?></td>
        <td><?php echo $fila['telefono']; ?></td>
        <td><?php echo $fila['fecha']; ?></td>
        <td><?php echo $fila['clave']; ?></td>
        <td><?php echo $fila['rol']; ?></td>
    </tr>

    <?php
            }
        }
    ?>

