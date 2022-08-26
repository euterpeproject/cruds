<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Contactos</title>
    
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

 
</head>
<body>
<!-- <div class="container mt-5 p-5"> -->
    <div class="main-wrapper">
    <center><h1>Listado de Contactos</h1></center>

    <?php
        
        include('../conexion/conexion.php');

        $registros=$mysql->query("select * from contacto order by id desc") or
        die($mysql->error);

        $cantidad = mysqli_num_rows($registros);
        
    ?> 

    <div class="col-md-6"> 
        <strong>Cantidad de Contactos<span style="color: crimson">  ( <?php echo $cantidad; ?> )</span> </strong>
    </div>

    <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Ingresa todos los campos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }
    ?>

    <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Vuelve a intentarlo.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }
    ?>

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
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error1') {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> El correo ya se encuentra registrado, intenta con otro diferente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }
    ?>

    <!-- validación para actualizaciones -->
    <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Actualizado!</strong> Los datos fueron actualizados correctammente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }
    ?>

    <!-- validación de error para actualizaciones -->    
    <?php   
        
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error2') {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Debes actualizar el correo.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }
    ?>

    <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Eliminado!</strong> Los datos se eliminaron correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }
    ?>

    <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error3') {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Los datos no fueron eliminados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }
    ?>

    <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="body">
        <div class="row clearfix">  
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-12 p-2">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">  
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Fecha Nacimiento</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Acción</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php 

                                //Paginador
                                $registros = $mysql->query("SELECT COUNT(*) as total_registro FROM contacto") or
                                die($mysql->error);

                                $result_register = mysqli_fetch_array($registros);
                                $total_registro = $result_register['total_registro'];

                                $por_pagina = 5;   

                                if(empty($_GET['pagina']))
                                {
                                    $pagina = 1;
                                }else{
                                    $pagina = $_GET['pagina'];
                                }

                                $desde = ($pagina-1) * $por_pagina;
                                $total_paginas = ceil($total_registro / $por_pagina);

                                $query = $mysql->query("SELECT * FROM contacto ORDER BY id desc LIMIT $desde,$por_pagina 
                                    ");

                                $result = mysqli_num_rows($query);
                                if($result > 0){

                                    while ($reg = mysqli_fetch_array($query)) {
                                        
                                ?>
                            <tr>
                                <td><?php echo $reg['id']; ?></td>
                                <td><?php echo $reg['name']; ?></td>
                                <td><?php echo $reg['phone']; ?></td>
                                <td><?php echo $reg['date']; ?></td>
                                <td><?php echo $reg['age']; ?></td>
                                <td><?php echo $reg['address']; ?></td>
                                <td><?php echo $reg['email']; ?></td>
                            <td> 
        
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarContacto<?php echo $reg['id']; ?>">
                                    Modificar
                                </button>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteContacto<?php echo $reg['id']; ?>">
                                    Eliminar
                                </button>
                                
                            </td>
                            </tr>
                                <!--Ventana Modal para Guardar--->
                                <?php  include('../templates/modal_agregar_contacto.php'); ?>
                                
                                <!--Ventana Modal para Actualizar--->
                                <?php  include('../templates/modal_editar_contacto.php'); ?>

                                <!--Ventana Modal para la Alerta de Eliminar--->
                                <?php include('../templates/modal_eliminar_contacto.php'); ?>
                                
                                <!--Ventana Modal para Consultar--->
                                <?php //include('../templates/modal_consultar_contacto.php'); ?>

                                <?php }
                                    }
                                    $mysql->close();
                                ?>

                            <tr><td colspan="5">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#guardarContacto">
                                Guardar
                            </button>

                            </td>
                            <td colspan="12">

                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#consultarContacto">
                                Consultar Contacto
                            </button> -->
                           
                            <form method="POST" action="#" class="col-8" id="buscar">
                                <button type="submit" class="btn btn-primary">Consultar</button>
                                <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Nombre, teléfono o correo" value="<?php //echo $_POST['buscar']; ?>">
                            </form>

                            </td>

                            <tr>
                                <td colspan="12">
                                    <?php include('../models/consulta.php'); ?>
                                </td>
                            </tr>
                                    
                        </tr>
                        

                        </table>
                        
                        <div class="paginador">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            <?php 
                                if($pagina != 1)
                                {
                            ?>
                                <li class="page-item"><a class="page-link" href="?pagina=<?php echo 1; ?>">|<</a></li>
                                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina-1; ?>">Previous</a></li>
                            <?php 
                                }
                                for ($i=1; $i <= $total_paginas; $i++) { 
                                    # code...
                                    if($i == $pagina)
                                    {
                                        echo '<li class="page-item"><a class="page-link">'.$i.'</a></li>';
                                    }else{
                                        echo '<li><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>';
                                    }
                                }

                                if($pagina != $total_paginas)
                                {
                            ?>
                                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina + 1; ?>">Next</a></li>
                                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
                            <?php } ?>
                            </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <center><h1>Listado de Contactos</h1></center>

    </div>
    
    </div>

    <!-- </div> -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(window).load(function() {
                $(".cargando").fadeOut(1000);
            });

        //Ocultar mensaje
        setTimeout(function () {
            $("#contenMsjs").fadeOut(1000);
        }, 3000);

        $('.btnBorrar').click(function(e){
            e.preventDefault();
            var id = $(this).attr("id");

            var dataString = 'id='+ id;
            url = "../models/eliminar_contacto.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    success: function(data)
                    {
                    window.location.href="../templates/listado_contactos.php";
                    $('#respuesta').html(data);
                    }
                });
                return false;
            });
        });
    </script>


</body>
</html>