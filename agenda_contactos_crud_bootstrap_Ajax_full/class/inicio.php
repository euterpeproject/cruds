<?php

/*
 *clase para iniciar la aplicacion
 */

/**
 * Description of inicio
 *
 * @author Victor Raul
 */
class inicio 
{
    public function __construct() {
        
    }
    
    public function __destruct() {
        
    }
    
    public function index()
    {
        header("Location:templates/listado_contactos.php");
    }
}

?>