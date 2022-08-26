<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Contacto</title>
</head>
<body>
    <?php include('../templates/listado_contactos.php'); ?>
    <div class="main-wrapper">
        
        <?php
            include('../conexion/conexion.php');

            $registros = $mysql->query("select * from contacto where name='$_REQUEST[name]'
            or phone='$_REQUEST[phone]' or email='$_REQUEST[email]'") or
                die($mysql->error);
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
                                </tr>
                                </thead>
                                <tbody>

                                <?php if ($reg = mysqli_fetch_array($registros)) { ?>

                                <tr>
                                    <td><?php echo $reg['id']; ?></td>
                                    <td><?php echo $reg['name']; ?></td>
                                    <td><?php echo $reg['phone']; ?></td>
                                    <td><?php echo $reg['date']; ?></td>
                                    <td><?php echo $reg['age']; ?></td>
                                    <td><?php echo $reg['address']; ?></td>
                                    <td><?php echo $reg['email']; ?></td>
                                </tr>

                                <?php } else {
                                        echo 'No existe un contacto con esa descripción';
                                    }
                                    $mysql->close();
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</body>
</html>

