function idioma(o) {
    if (o == "C") {
        document.getElementById("titulo").innerHTML = "CONSEGUIR LAS PROPIEDADES DE DISTINTOS ELEMENTOS";
    }else if (o == "E") {
        document.getElementById("titulo").innerHTML = "ELEMENTO DESBERDINEN PROPIETATEAK LORTU";
    }
}
function imagen() {
    var radio = document.getElementsByName("radio");
    radio.forEach(aux => {
        if (aux.checked) {
            document.getElementById("foto").src = "imagenes/"+ aux.id +".jpg";
        };
    });
}
function validar(){
    var nombre = document.getElementById("Izena").value;
    var nick = document.getElementById("Nick").value;
    var pass = document.getElementById("Pasahitza").value;
    var regex = new RegExp("^.{8,}$");
    var resReg = regex.test(pass);
    // var regTarjeta = new RegExp("\\d{4}-\\d{4}-\\d{4}-\\d{4}");
    // var resTarjeta = regTarjeta.test(tarjeta);
    
    if (resReg) {
        document.getElementById("SaludoAqui").innerHTML = "Hola "+ nombre +" tu nick es "+ nick +" y tu contraseña es "+ pass;
    } else {
        alert("La contraseña tiene que ser minimo de 8 caracteres!");
    }
}