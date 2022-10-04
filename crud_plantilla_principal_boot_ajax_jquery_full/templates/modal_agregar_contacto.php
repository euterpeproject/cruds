
<!-- Modal -->
<div class="modal fade" id="modal_agregar_contacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content contentagregar bg-dark">
      <div class="modal-body">
      <div class="container">
      <div class="modal-header headeragregar">
        <h5 class="modal-title titleagregar">Agregar Contacto</h5>
      </div>
      <div class="alert alertagregar alert-transparent alert-dismissible fade show" role="alert">
        <form action="../models/agregar_contacto.php" method="post">
        <div class="row g-3">
            <div class="col">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="nombre" required>
                </div>
                <div class="col">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="teléfono" required>
            </div>
        </div><br>
        <div class="row g-3">
            <div class="col">
                <label for="date" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Fecha nacimiento" required>
            </div>
            <div class="col">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Dirección" required>
            </div>
        </div><br>
        <div class="row g-3">
            <div class="col">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo" required>
            </div>
        </div><br>
        </div>
        <div class="modal-footer footeragregar bg-transparent">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Guardar Cambios</button>     
        </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>