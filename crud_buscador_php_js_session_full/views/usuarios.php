<?php
include('../includes/sesion/iniciarSesion.php');
/* session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {
    header("location: ../includes/login.php");
    die();
} */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/estilo.css"> -->

</head>
<body>

    <div class="container is-fluid">
        <div class="col-xs-12">
        <br><center><h1>Lista de Usuarios</h1></center>
            <h2>Bienvenido Administrador <?php echo $_SESSION['nombre']; ?></h2>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Nuevo Usuario<i class="fa-solid fa-user-plus"></i></button>

            <!-- Este input hidden puede ir aca on en editar_usuarios.php directamente -->
            <!-- <input id="action-button" type="hidden" data-bs-toggle="modal" data-bs-target="#editar"> -->

            <a class="btn btn-warning" href="../includes/sesion/cerrarSesion.php">Log Out
            <i class="fa-solid fa-person-walking-dashed-line-arrow-right"></i>
            </a>
            <a class="btn btn-primary" href="../includes/excel.php">Excel
                <i class="fa fa-table" aria-hidden="true"></i>
            </a>
            <a class="btn btn-primary" href="../includes/reporte.php">PDF</a>
        </div>
    </div> <br>

    <div class="container-lg">
        <form class="d-flex">
            <form action="" method="get">
                <input class="form-control me-2" type="search" placeholder="Buscar uno/todos con PHP" name="busqueda">
                <button class="btn btn-outline-info" type="submit" name="enviar" onclick="eliminaEspacio();">Mostrar/Todos</button>
            </form>

            <?php
                include('../includes/db.php');
                // $mysqli = new mysqli("localhost", "root", "", "registro_usuarios");
                $where = "";

                if (isset($_GET['enviar'])) {
                    $busqueda = $_GET['busqueda'];

                    if (isset($_GET['busqueda'])) {
                        $where = "where correo like'%".$busqueda."%' or nombre like'%".$busqueda."%'
                        or telefono like'%".$busqueda."%'";
                    }
                }
            ?>
        </form>    
    </div> <br>

    <div class="container-lg">
        <form class="d-flex">
            <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar en cada lista con JS">
        </form>
    </div><br>

    <div class="container-lg">
        <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se Ingresaron los datos correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            }
        ?>

        <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado') {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Actualizado!</strong> El correo debe ser único para actualizar los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            }
        ?>

        <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> El correo ya se encuentra registrado, intenta con otro diferente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            }
        ?>
    </div>

    <?php 
        $registros=$mysqli->query("select * from usuarios") or
        die($mysql->error);

        $cantidad = mysqli_num_rows($registros); 
    ?>

    <div class="container-lg"> 
        <strong>Cantidad de Contactos<span style="color: crimson">  ( <?php echo $cantidad; ?> )</span> </strong>
    </div>

    <div class="container-lg table-responsive">
    <table class="table mb-2 align-middle table-sm table-striped table-dark table_id table-bordered border-primary">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Fecha</th>
                <!-- <th>Contraseña</th> -->
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            <?php

                if (isset($_REQUEST['pos']))
                    $inicio=$_REQUEST['pos'];
                else
                    $inicio=0;

                include('../includes/db.php');

                $dato =$mysqli->query ("select *, permisos.rol, usuarios.id 
                        from usuarios
                        left join permisos
                        on usuarios.rol = permisos.id
                        $where
                        order by usuarios.id asc limit $inicio,3");

                if ($dato -> num_rows > 0) {
                    $impresos=0;
                    while ($fila = mysqli_fetch_array($dato)) {
                        $impresos++;    
            ?>
            <tr>
                <td scope="row"><?php echo $fila['id']?></td>
                <td scope="row"><?php echo $fila['nombre']?></td>
                <td scope="row"><?php echo $fila['correo']?></td>
                <td scope="row"><?php echo $fila['telefono']?></td>
                <td scope="row"><?php echo $fila['fecha']?></td>
                <!-- <td><?php //echo $fila['clave']?></td> -->
                <td scope="row"><?php echo $fila['rol']?></td>
                <td scope="row">
                    <a class="btn btn-outline-primary"  href="./editar_usuarios.php?id=<?php echo $fila['id']?>">
                    <i class="fa-solid fa-pen-to-square"></i></a>

                    <a class="btn btn-outline-danger" href="eliminar_usuarios.php?id=<?php echo $fila['id']?>">
                    <i class="fa-solid fa-trash-can-arrow-up"></i></a>
                </td>
            </tr>

            <?php 
                    } $mysqli->close();
                } else {
            ?>
                <tr class="text-center">
                    <td colspan="16">No existen registros</td>
                </tr>

                <?php
                    } 
                    
                ?>
        </tbody>
    </table>
        <tr>
            <?php
                if ($inicio==0) 
                echo "<center><button class='btn btn-dark border-primary'>Anteriores</button> ";
                else
                {
                $anterior=$inicio-3;
                echo "<a href=\"./usuarios.php?pos=$anterior\" id=\"ant\"><center><button class='btn btn-dark border-primary'>Anteriores</button> </a>";
                }
                if ($impresos==3)
                {
                $proximo=$inicio+3;
                echo "<a href=\"./usuarios.php?pos=$proximo\" id=\"sig\"><button class='btn btn-dark border-primary'>Siguientes</button></center></a>";
                }
                else
                echo "<button class='btn btn-dark border-primary'>Siguientes</button></center>";
            ?>
        </tr>
    </div>

    <br><center><h1>Lista de Usuarios</h1></center>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script>

<script src="../js/buscador.js"></script>
<script src="../js/paginadorAjax.js"></script>

<script>
    $(document).ready(function() {
  // indicamos que se ejecuta la funcion a los 0 segundos de haberse cargado la página
  setTimeout(clickbutton, 0);

  function clickbutton() {
    // simulamos el click del mouse en el input hidden que esta en editar_usuarios.php  
    $("#action-button").click();
    //alert("Aqui llega"); //Debugger

    //mostramos la modal que esta en editar_usuarios.php con los datos cargados
    //desde aquí con el <a></a> anchor html
    $('#editar').modal('hide');   
  }
  $('#action-button').on('click',function() {
    console.log('action button clicked');
  });

});

function eliminaEspacio() {
    $('input').val(function(_, value) {
        return $.trim(value);
    });
}

</script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<button id="action-button">hola soy el action button, vengo a flotar</button> -->

<?php include('../index.php'); ?>

</body>
</html>