function Enviar() {
    var x = document.encuesta.correo.value;
    if (x != ""){
        return true;
    }else{
        alert("El campo esta vacio");
        return false;

    }
}