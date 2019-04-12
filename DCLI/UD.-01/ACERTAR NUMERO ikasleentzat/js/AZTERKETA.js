var numaleat = Math.round(Math.random() * 50);

function empezar() {
    document.getElementById("divjuego").style.display = "block";
    document.getElementById("generar").style.display = "none";
}
var cont = 0;
function juego() {
    var miNum = document.getElementById("mi_numero").value;
    var id = "celda";
    
    if (cont <= 4) {
        check(miNum);
        
        console.log(id + cont);

        document.getElementById(id + cont).style.backgroundColor = "red";
        cont++;

    } else{
        document.getElementById("texto").innerHTML = "<h5>Has realizado el numero maximo de intentos!</h5>";
        document.getElementById("divimagen").style.display = "block";
        document.getElementById("imagen").src = "images/error.png";
    }
}

function check(n) {
    if (n > numaleat) {
        document.getElementById("texto").innerHTML = "<h5>El numero es menor que " + n + "</h5>";
        document.getElementById("divimagen").style.display = "block";
        document.getElementById("imagen").src = "images/error.png";
    } else if (n < numaleat) {
        document.getElementById("texto").innerHTML = "<h5>El numero es mayor que "+n+"</h5>";
        document.getElementById("divimagen").style.display = "block";
        document.getElementById("imagen").src = "images/error.png";
    } else if (n = numaleat) {
        document.getElementById("texto").innerHTML = "<h5>Has acertado el numero!!!</h5>";
        document.getElementById("divimagen").style.display = "block";
        document.getElementById("imagen").src = "images/ok.png";
    }
}