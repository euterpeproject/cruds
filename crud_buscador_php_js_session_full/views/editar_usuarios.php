<?php
include('../includes/sesion/iniciarSesion.php');

$id = $_GET['id'];
include('../includes/db.php');
// $mysqli = new mysqli("localhost", "root", "", "registro_usuarios");
$consulta = "select * from usuarios where id = $id";
$resultado = $mysqli->query($consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <!-- Se carga bootstrap para limpiar la pantalla de segundo plano con el formulario html -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body id="page-top">

<center>
<div class="modal fade" id="editar" tabindex="-1" data-bs-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content text-light text-center bg-dark">
                <div class="modal-header">
                <h5 class="modal-title">Editar Usuario<i class="fa-solid fa-user-plus"></i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        <!-- Input hidden para llamar la modal desde la función de jQuery en usuarios.php-->
                        <input id="action-button" type="hidden" data-bs-toggle="modal" data-bs-target="#editar">
                </div>
                <div class="modal-body">
                    <form action="../includes/functions.php" method="post">
                    <input type="hidden" name="accion" value="editar_registro">
                    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

                    <div class="form-group">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $usuario['nombre'];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="correo" class="form-label">Correo</label>
                      <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $usuario['correo']?>" required>
                    </div>
                    <div class="form-group">
                      <label for="telefono" class="form-label">Teléfono</label>
                      <input type="number" name="telefono" id="telefono" class="form-control" value="<?php echo $usuario['telefono']?>" required>
                    </div>
                    <div class="form-group">
                      <label for="clave" class="form-label">Clave</label>
                      <input type="password" name="clave" id="clave" class="form-control" value="<?php echo $usuario['clave']?>" required>
                    </div>
                    <div class="form-group">
                      <label for="rol" class="form-label">Rol</label>
                      <input type="number" name="rol" id="rol" class="form-control" value="<?php echo $usuario['rol']?>" required>
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
    </center>
    
<?php include('./usuarios.php'); ?>

</body>
</html>