
<!-- Modal -->
<div class="modal fade" id="modal_eliminar_contacto<?php echo $reg['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content contenteliminar bg-dark">
    <div class="modal-body">
      <div class="container">
      <div class="modal-header headereliminar">
        <h5 class="modal-title titleeliminar">Eliminar Contacto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <center><div class="alert alerteliminar alert-danger alert-dismissible fade show" role="alert">
        <form action="../models/eliminar_contacto.php" method="post">
          <input type="hidden" name="id" value="<?php echo $reg['id']?>">
            <strong>Eliminar!</strong> ¿Realmente desea eliminar a <?php echo "<b>" . $reg['name'] . "</b>" ?>?
      </div></center>
      <div class="modal-footer footereliminar bg-transparent">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" >Eliminar</button>
      </div>
      </div>
        </form>
      </div>

    </div>
  </div>
</div>