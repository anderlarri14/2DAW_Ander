function iguales(){
    var c1 = document.encuesta.correo1.value;
    var c2 = document.encuesta.correo2.value;

    if (c1 == c2) {
        return true;
    } else{
        alert("Los campos no son iguales");
        return false;
    }

}
