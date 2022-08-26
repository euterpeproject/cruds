<?php
include('../conexion/conexion.php');

$result = $mysql->query($query);

?>

<!-- Modal -->
<div class="modal fade" id="modalConsultar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #51AB65 !important;">
            <h6 class="modal-title" style="color: #fff; text-align: center;">
                Actualizar Información
            </h6>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
                
            <form method="post" action="../models/actualizar_contacto.php">

            <?php 

            if ($row = mysqli_fetch_array($result)) { 
                
                ?>

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nombre de Contacto:</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Teléfono:</label>
                  <input type="number" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Fecha Nacimiento:</label>
                  <input type="date" name="date" class="form-control" value="<?php echo $row['date']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Dirección:</label>
                  <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Correo: (Para guardar cambios actualice el correo)</label>
                  <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required="true">
                </div>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>

            <?php 
                  }  
                 $mysql->close();
            ?>

       </form>
       
        </div>
    </div>
</div>


