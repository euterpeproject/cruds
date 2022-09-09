<?php
// include('includes/sesion/iniciarSesion.php');
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {
    header("Location:./includes/login.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

</head>
<body id="page-top">

    <!-- Modal -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-light text-center bg-dark">
                <div class="modal-header">
                <h5 class="modal-title">Nuevo Usuario<i class="fa-solid fa-user-plus"></i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validar.php" method="post">

                    <div class="form-group">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="correo" class="form-label">Correo</label>
                      <input type="email" name="correo" id="correo" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="telefono" class="form-label">Teléfono</label>
                      <input type="number" name="telefono" id="telefono" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="clave" class="form-label">Clave</label>
                      <input type="password" name="clave" id="clave" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="rol" class="form-label">Rol</label>
                      <input type="number" name="rol" id="rol" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" value="Guardar" class="btn btn-outline-primary" name="registrar">
                        <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
                    </div>

                    </form>
                </div>
                
            </div>
        </div>
    </div>
    
</body>
</html>