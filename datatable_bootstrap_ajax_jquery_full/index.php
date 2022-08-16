<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatables</title>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css"> 

</head>
<body>

    <center><h1>Datatables</h1></center>
    
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12">
            <button type="button" class="btn btn-primary btn-lg" id="btnNuevo" data-bs-toggle="modal" data-bs-target="#modalCRUD">
            <span class="material-icons">add_to_queue</span>
            </button>    

            <table id="tablaUsuarios" class="table table-striped table-hover caja">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>User_Id</th>
                            <th>userName</th>
                            <th>FirstName</th>                                
                            <th>LastName</th>  
                            <th>Gender</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>    
    </div>   
    
    <center><h1>Datatables</h1></center>

    <?php include('templates/modal_crud.php'); ?>
    <?php include('templates/modal_crud_eliminar.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/main.js"></script> 

    <!-- Script para cambiar el idioma a datatable -->
    <!-- <script>
        $(document).ready(function () {
            $('#tablaUsuarios').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                }
            });
        });
    </script> -->

</body>
</html>