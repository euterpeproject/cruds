<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    
    <form action="functions.php" method="post">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">

                        <br><br><h3 class="text-center">Iniciar Sesión</h3>

                            <div class="form-group">
                              <label for="nombre" class="form-label">Usuario</label>
                              <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="clave" class="form-label">Contraseña</label>
                              <input type="password" name="clave" id="clave" class="form-control" required>
                              <input type="hidden" name="accion" value="acceso_user">
                            </div><br>
                            <div class="form-group">
                              <input type="submit" class="btn btn-success" value="Ingresar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
</html>