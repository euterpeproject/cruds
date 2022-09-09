<?php
// include('./includes/sesion/iniciarSesion.php');  //Error
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {
    header("location: ../includes/login.php");
    die();
}

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

</head>
<body>

    <div class="container is-fluit">
        <div class="col-xs-12">
            <br><br><center><h1>Lista Usuarios</h1></center>
            <h2>Bienvenido Lector@ <?php echo $_SESSION['nombre']; ?></h2>
        </div>
    </div>
    <div class="container-lg col-xs-12">
        <a class="btn btn-warning" href="../includes/sesion/cerrarSesion.php">Log Out
        <i class="fa-solid fa-person-walking-dashed-line-arrow-right"></i>
        </a>
        <a class="btn btn-primary" href="../includes/lectorexcel.php">Excel
        <i class="fa fa-table" aria-hidden="true"></i>
        </a>
    </div><br>

    <div class="container-lg">
        <form class="d-flex">
            <form action="" method="get">
                <input class="form-control me-2" type="search" placeholder="Buscar uno/todos con PHP" name="busqueda">
                <button class="btn btn-outline-info" type="submit" name="enviar" onclick="eliminaEspacio();">Buscar/Todos</button>
            </form>

            <?php
                include('../includes/db.php');
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
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Rol</th>
                </tr>
            </thead>
            <tbody>
            
                <?php

                    if (isset($_REQUEST['pos']))
                        $inicio=$_REQUEST['pos'];
                    else
                        $inicio=0;

                    include('../includes/db.php');

                    $dato = $mysqli->query("select *, usuarios.id, permisos.rol 
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
                    <td scope="row"><?php echo $fila['id']; ?></td>
                    <td scope="row"><?php echo $fila['nombre']; ?></td>
                    <td scope="row"><?php echo $fila['correo']; ?></td>
                    <td scope="row"><?php echo $fila['telefono']; ?></td>
                    <td scope="row"><?php echo $fila['fecha']; ?></td>
                    <td scope="row"><?php echo $fila['rol']; ?></td>
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
                echo "<a href=\"./lector.php?pos=$anterior\" id=\"ant\"><center><button class='btn btn-dark border-primary'>Anteriores</button> </a>";
                }
                if ($impresos==3)
                {
                $proximo=$inicio+3;
                echo "<a href=\"./lector.php?pos=$proximo\" id=\"sig\"><button class='btn btn-dark border-primary'>Siguientes</button></center></a>";
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
        function eliminaEspacio() {
            $('input').val(function(_, value) {
                return $.trim(value);
            });
        }
    </script>

</body>
</html>