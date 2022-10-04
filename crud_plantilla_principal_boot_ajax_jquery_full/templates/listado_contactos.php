<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Contactos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <div id="containerl" class="container">

    <br><center><h1>Listado Contactos</h1></center><br>

    <div class="container-lg">
        <form class="d-flex">
            <form action="" method="get">
                <input class="form-control me-2" type="search" placeholder="Buscar con PHP" name="busqueda">
                <button class="btn btn-primary" type="submit" name="enviar" onclick="eliminaEspacio();">Mostrar/Todos</button>
            </form>

            <?php
                include('../conexion/conexion.php');
                $where = "";

                if (isset($_GET['enviar'])) {
                    $busqueda = $_GET['busqueda'];

                    if (isset($_GET['busqueda'])) {
                        $where = "where email like'%".$busqueda."%' or name like'%".$busqueda."%'
                        or phone like'%".$busqueda."%'";
                    }
                }
            ?>
        </form>    
    </div> <br>

    <div class="container-lg">
        <form class="d-flex">
            <input type="text" class="form-control me-2 light-table-filter" data-table="table_id" placeholder="Buscar en cada lista con JS">
        </form>
    </div><br>

    <?php
        include('../conexion/conexion.php');

        $registros = $mysqli->query("select * from contacto") or
        die($mysqli->error);

        $cantidad = mysqli_num_rows($registros);
    ?>

    <div class="col-md-6"> 
        <strong>Cantidad de Contactos<span style="color: crimson">  ( <?php echo $cantidad; ?> )</span> </strong>
    </div>

    <!-- <div class="col-md-1 mb-1">
        <label for="" class="form-label">City</label>
        <select id="menu" name="menu" class="form-select form-select-sm" >
            <option value="1" selected>10</option>
            <option value="2">25</option>
            <option value="3">50</option>
            <option value="4">100</option>
        </select>
    </div> -->

        <!-- Poner el id a la tabla en la clase de bootstrap class="table_id" para buscar con javascript  -->        
        <table class="table mb-2 align-middle table_id table-sm table-striped table-hover table-dark table-bordered border-primary">
        <thead>
            <tr>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Fecha Nacimiento</th>
            <th scope="col">Edad</th>
            <th scope="col">Dirección</th>
            <th scope="col">Correo</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                if (isset($_REQUEST['pos']))
                $inicio = $_REQUEST['pos'];
                else 
                $inicio = 0;
                include('../conexion/conexion.php');
                $registros = $mysqli->query("select * from contacto $where order by id asc limit $inicio,10") or
                die($mysqli->error);

                $impresos = 0;
                while ($reg = mysqli_fetch_array($registros)) {
                    $impresos++;
            ?>

            <tr></tr> 

            <tr>
            <td><?php echo $reg['id']?></td>
            <td><?php echo $reg['name']?></td>
            <td><?php echo $reg['phone']?></td>
            <td><?php echo $reg['date']?></td>
            <td><?php echo $reg['age']?></td>
            <td><?php echo $reg['address']?></td>
            <td><?php echo $reg['email']?></td>

            <th>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_editar_contacto<?php echo $reg['id']?>">
            <i class="fa-sharp fa-solid fa-user-pen"></i>
            </button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_eliminar_contacto<?php echo $reg['id']?>">
            <i class="fa-sharp fa-solid fa-user-minus"></i>
            </button>
            </th>

            </tr>

            <?php include('../templates/modal_agregar_contacto.php'); ?>
            <?php include('../templates/modal_editar_contacto.php'); ?>
            <?php include('../templates/modal_eliminar_contacto.php'); ?>
    
        </tbody>

        <?php }
            $mysqli->close();
        ?>

        <tr></tr>            

        <tr>
            <th colspan="6">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_agregar_contacto">
                <i class="fa-sharp fa-solid fa-user-plus"></i>
                </button>
            </th>

            <td colspan="6">

            <?php
                if ($inicio==0) 
                    echo "
                    <nav aria-label='Page navigation example'>
                        <ul class='pagination justify-content-start'>
                            <li class='page-item disabled'>
                                <a class='page-link'>Previous</a>
                            </li>
                    ";
                else
                {
                    $anterior=$inicio-10;
                    $anteriorx=$anterior+10;
                    echo "
                    <nav aria-label='Page navigation example'>
                        <ul class='pagination justify-content-start'>
                            <li class='page-item'>
                                <a class='page-link' href=\"../templates/listado_contactos.php\" id=\"ant\"><</a>
                            </li>
                            <li class='page-item'>
                                <a class='page-link' href=\"../templates/listado_contactos.php?pos=$anterior\" id=\"ant\">Previous</a>
                            </li>
       
                    <li class='page-item'><a class='page-link' href=\"../templates/listado_contactos.php?pos=$anterior\" id=\"ant\">$anterior</a></li>
                    <li class='page-item'><a class='page-link' href=\"../templates/listado_contactos.php?pos=$anterior\" id=\"sig\">$anteriorx</a></li> 
                    ";
                }
                if ($impresos==10)
                {
                    $proximo=$inicio+10;
                    $proximox = $proximo+10;

                    echo "
                    <li class='page-item'><a class='page-link' href=\"../templates/listado_contactos.php?pos=$proximo\" id=\"sig\">$proximo</a></li>
                    <li class='page-item'><a class='page-link' href=\"../templates/listado_contactos.php?pos=$proximo\" id=\"sig\">$proximox</a></li>
                    
                    <li class='page-item'>
                                <a class='page-link' href=\"../templates/listado_contactos.php?pos=$proximo\" id=\"sig\">Next</a>
                            </li>
                            <li class='page-item'>
                                <a class='page-link' href=\"../templates/listado_contactos.php?pos=500\" id=\"ant\">></a>
                            </li>
                        </ul>
                    </nav>
                    
                    ";
                }
                else
                    echo "
                            <li class='page-item disabled'>
                                <a class='page-link' href='#'>Next</a>
                            </li>
                        </ul>
                    </nav>

                    ";
            ?>

            </td>

        </tr>
        <tr>
            <th colspan="12"> 
            </th>
        </tr>         
        </table>

        <center><h1>Listado Contactos</h1></center><br>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script src="../js/buscador.js"></script>
    <script src="../js/paginador.js"></script>


    <script>
        $(document).ready(function() {
        // indicamos que se ejecuta la funcion a los 0 segundos de haberse cargado la página
        setTimeout(clickbutton, 0);

        //función para lanzar la modal de validación, actualización e ingreso correcto de datos
        function clickbutton() {
            // simulamos el click del mouse en el input hidden que esta en models/actualizar_contacto.php  
            $("#action-button").click();
            //alert("Aqui llega"); //Debugger

            //mostramos la modal que esta en models/actualizar_contacto.php con los datos cargados
            $('#modal_editar_final').modal('hide');   
        }

        //función para lanzar la modal de validación, actualización e ingreso incorrecto de datos
        function clickbutton() {
            // simulamos el click del mouse en el input hidden que esta en models/actualizar_contacto.php  
            $("#action-button").click();
            //alert("Aqui llega"); //Debugger

            //mostramos la modal que esta en models/actualizar_contacto.php con los datos cargados
            $('#modal_error_editar').modal('hide');   
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


</body>
</html>