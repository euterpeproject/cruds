<?php
include('../conexion/conexion.php');

if (empty($_REQUEST["id"])) {

        include('../templates/listado_contactos.php');
        ?>
            <!-- <center><div class="alert alert-danger alert-dismissible fade show" style="width: 80%;" role="alert">
            <strong>Error!</strong> Debe ingresar todos los datos del <b>contacto</b>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div></center> -->
        <?php
        exit();
}

if ($_REQUEST['id']) {
        $mysqli->query("delete from contacto where id='$_REQUEST[id]' ") or
                die($mysqli->error);     

        include('../templates/listado_contactos.php');
        ?>

                <div class="modal fade" id="modal_editar_final" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content contenteditarfinal bg-dark">
                    <div class="modal-body">
                        <div class="container">
                        <div class="modal-header headereditarfinal">
                        <h5 class="modal-title titleeditarfinal">Contacto eliminado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <input id="action-button" type="hidden" data-bs-toggle="modal" data-bs-target="#modal_editar_final">
                        </div>
                        <center><div class="alert alerteditarfinal alert-success alert-dismissible fade show" role="alert">
                                <strong>Eliminado!</strong> El contacto con el código <b>#<?php echo $_REQUEST['id']; ?> </b> se eliminó correctamente.
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