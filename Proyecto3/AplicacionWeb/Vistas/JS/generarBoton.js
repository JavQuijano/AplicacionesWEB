function generarBtn(tipo){
    var nodoBoton = document.getElementById("btnConfig");
    if(tipo === 'admin'){
        nodoBoton.innerHTML = "Configurar Salones";
        nodoBoton.href = "configAdmin.php"
    }else if(tipo === 'usuario'){
        nodoBoton.innerHTML = "Salones Favoritos";
        nodoBoton.href = "configUsuario.php";
    }
}