<?php
include('../conexion/conexion.php');

if (empty($_REQUEST["name"]) || empty($_REQUEST["phone"])) {

    include('../templates/listado_contactos.php');
    ?>
        <!-- <center><div class="alert alert-danger alert-dismissible fade show" style="width: 80%;" role="alert">
        <strong>Error!</strong> Debe ingresar todos los datos del <b>contacto</b>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></center> -->
    <?php
    exit();
}

$validar_email = $mysqli->query("select * from contacto where email='$_REQUEST[email]'");
$fila = mysqli_num_rows($validar_email);

if ($fila > 0) {
        include('../templates/listado_contactos.php');
        ?> 
            <div class="modal fade" id="modal_error_editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content contenterroreditar bg-dark">
                    <div class="modal-body">
                    <div class="container">
                    <div class="modal-header headererroreditar">
                        <h5 class="modal-title titleerroreditar">Error de actualización</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <input id="action-button" type="hidden" data-bs-toggle="modal" data-bs-target="#modal_error_editar">
                    </div>
                        <center><div class="alert alerterroreditar alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> El correo <b><?php echo "`$_REQUEST[email]`"; ?></b> ya está registrado, Intenta con otro diferente.
                        </div></center>
                        <div class="modal-footer footererroreditar bg-transparent">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        <?php
        exit();
    
} else {

    $fecha_nacimiento = $_REQUEST['date'];
    $dia_actual = date("Y-m-d");
    $_REQUEST['age'] = date_diff(date_create($fecha_nacimiento), date_create($dia_actual))->format('%y');

    // $_REQUEST['age'] =  date("Y-m-d") - $_REQUEST['date'];

    $resultado = $mysqli->query("update contacto set name='$_REQUEST[name]', phone='$_REQUEST[phone]', 
                                date='$_REQUEST[date]', age='$_REQUEST[age]', address='$_REQUEST[address]', 
                                email='$_REQUEST[email]' where id='$_REQUEST[id]' ") or
                                die($mysqli->error); 

                include('../templates/listado_contactos.php');
                ?>
                
                    <div class="modal fade" id="modal_editar_final" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content contenteditarfinal bg-dark">
                        <div class="modal-body">
                        <div class="container">
                        <div class="modal-header headereditarfinal">
                            <h5 class="modal-title titleeditarfinal">Contacto Actualizado</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <input id="action-button" type="hidden" data-bs-toggle="modal" data-bs-target="#modal_editar_final">
                        </div>
                        <center><div class="alert alerteditarfinal alert-success alert-dismissible fade show" role="alert">
                                <strong>Actualizado!</strong> Los datos de <b><?php echo "`$_REQUEST[name]`";?></b> se actualizaron correctamente.
                        </div></center>
                        <div class="modal-footer footereditarfinal bg-transparent">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>

                <?php
                exit();
    }

    $mysqli->close();

?>
