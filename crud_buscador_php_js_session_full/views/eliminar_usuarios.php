<?php
include('../includes/sesion/iniciarSesion.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuarios</title>

</head>
<body id="page-top">
    
    <!-- Modal Body -->
    <div class="modal fade" id="eliminar" tabindex="-1" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-sm" role="document">
            <div class="modal-content text-light bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Eliminar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        <!-- Input hidden para llamar la modal desde la función de jQuery en usuarios.php-->
                        <input id="action-button" type="hidden" data-bs-toggle="modal" data-bs-target="#eliminar">
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="alert alert-primary text-center">
                            <p>¿Desea confirmar la eliminacion del registro? <?php echo "<h4><b><span style='color:#005D80;'>" . $_GET['id'] . "<i class='fa-solid fa-user-slash'></i></span></b></h4>"?></p>

                        <form action="../includes/functions.php" method="post">
                            <input type="hidden" name="accion" value="eliminar_registro">
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                            <a href="./usuarios.php" class="btn btn-secondary">Cancelar</a>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<?php include('./usuarios.php'); ?>

</html>