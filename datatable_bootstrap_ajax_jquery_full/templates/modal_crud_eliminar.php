    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCrudEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuariosEliminar">    
            <div class="modal-body">
            <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="username" class="col-form-label">Eliminación del Usuario:</label>
                    <!-- <input type="text" class="form-control" id="username"> -->
                    </div>
                    </div>    
                </div>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnBorrar" class="btn btn-dark">Eliminar</button>
            </div>
        </form>    
        </div>
    </div>
</div>