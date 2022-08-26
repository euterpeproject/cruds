<?php
include('../conexion/conexion.php');

$result = $mysql->query($query);

?>

<!-- Modal -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #51AB65">
                <h4 class="modal-title" style="color: #fff; text-align: center;">
                    ¿Realmente deseas eliminar a ?
                </h4>
            </div>

            <!-- <div class="modal-body"> -->
                
            <form method="post" action="../models/eliminar_contacto.php">

                <?php 

                if ($row = mysqli_fetch_array($result)) { 
                    
                    ?>

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="modal-body" id="cont_modal">

                <strong style="text-align: center !important"> 
                    <?php echo $row['name']; ?>
                </strong>
                </div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Borrar</button>
                </div>

                <?php 
                    }  
                    $mysql->close();
                ?>

            </form>

            <!-- </div> -->
        </div>
    </div>
</div>