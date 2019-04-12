function idioma(i) {
    document.getElementById("tituloh1").innerHTML = i;
}

function monte() {
    document.getElementById("irudia").src="img/repaso1.jpeg";
    document.getElementById("irudia").style.height = "167px";

}

function puente() {
    document.getElementById("irudia").src ="img/repaso2.jpeg";
    document.getElementById("irudia").style.height ="167px";

}

function tamañoFuente(t) {
    var textos = document.getElementsByName("textop");
    console.log(textos);
    textos.forEach(aux => {
        aux.style.fontSize=t;
    });

}

function relleno() {
    
}