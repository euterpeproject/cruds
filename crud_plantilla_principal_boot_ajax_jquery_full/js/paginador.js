addEventListener('load', inicializarEventos,false);

function inicializarEventos() {
    cargarPagina('../templates/listado_contactos.php');
}

function presionEnlace(e) {
    e.preventDefault();
    var url = e.target.getAttribute('href');
    cargarPagina(url);
}

var conexion;

function cargarPagina(url) {
    if (url == '') {
        return;
    }
    conexion = new XMLHttpRequest();
    conexion.onreadystatechange = procesarEventos;
    conexion.open("GET", url, true);
    conexion.send(null);
}

function procesarEventos() {
    // var detalles = document.getElementById("detalles");
    var detalles;
    if (conexion.readyState == 4) {
        detalles.innerHTML = conexion.responseText;
        var ob = document.getElementById('sig');
        if (ob != null)
        ob.addEventListener('click',presionEnlace,false);
        var ob2 = document.getElementById('ant');
        if (ob2 != null)
        ob2.addEventListener('click',presionEnlace,false);
    }
    else {
        detalles.innerHTML = '<img src="../img/cargando.gif">';
    }
}