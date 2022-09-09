<?php
require_once("db.php");
header("content-type: application/xls");
header("content-disposition: attachment; filename = lector.xls");
?>
    
<table class="table table-striped table-dark" id="table_id">        
<thead>
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Fecha</th>
        <th scope="col">Rol</th>
    </tr>
</thead>
<tbody>
    <?php
        include('./db.php');
        // $mysqli = new mysqli("localhost", "root", "", "registro_usuarios");
        $sql = "select *, usuarios.id, permisos.rol
        from usuarios 
        left join permisos 
        on usuarios.rol = permisos.id";
        $dato = $mysqli->query($sql);

        if ($dato -> num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {
    ?>
    <tr>
        <td scope="row"><?php echo $fila['nombre']; ?></td>
        <td scope="row"><?php echo $fila['correo']; ?></td>
        <td scope="row"><?php echo $fila['telefono']; ?></td>
        <td scope="row"><?php echo $fila['fecha']; ?></td>
        <td scope="row"><?php echo $fila['rol']; ?></td>
    </tr>
<?php
    }
    }
?>
