
<!-- Modal -->
<div class="modal fade" id="modal_editar_contacto<?php echo $reg['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content contenteditar bg-dark">
      <div class="modal-body">
      <div class="container">
      <div class="modal-header headereditar">
        <h5 class="modal-title titleeditar">Actualizar Contacto</h5>
      </div>
      <div class="alert alerteditar alert-transparent alert-dismissible fade show" role="alert">
        <form action="../models/actualizar_contacto.php" method="post">
            <input type="hidden" name="id" value="<?php echo $reg['id']?>">
        <div class="row g-3">
            <div class="col">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="nombre" value="<?php echo $reg['name']?>" required>
                </div>
                <div class="col">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="teléfono" value="<?php echo $reg['phone']?>" required>
            </div>
        </div><br>
        <div class="row g-3">
            <div class="col">
                <label for="date" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Fecha nacimiento" value="<?php echo $reg['date']?>" required>
                </div>
            <div class="col">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Dirección" value="<?php echo $reg['address']?>" required>
            </div>
        </div><br>
        <div class="row g-3">
              <div class="col">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo" value="<?php echo $reg['email']?>" required>
            </div>
        </div><br>
        </div>
        <div class="modal-footer footereditar bg-transparent">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>