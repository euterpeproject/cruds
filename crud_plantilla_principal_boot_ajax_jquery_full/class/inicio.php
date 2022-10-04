<?php

/*
 *clase para iniciar la aplicacion
 */

/**
 * Description of inicio
 *
 * @author Victor Raul
 */

class inicio {

    public function_construct() {

    }

    public function_destruct() {
        
    }

    public function index() {
        header("location:templates/listado_contactos.php");
    }
}
?>