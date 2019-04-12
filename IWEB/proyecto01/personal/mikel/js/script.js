function cambiarJumbotron(elemento) {
    if (elemento == "card1") {
        var titulo = "Título Jumbotrón Card 1";
        var descripcion = "Cáncer es el nombre común que recibe un conjunto de enfermedades relacionadas en las que se observa un proceso descontrolado en la división de las células del cuerpo. CARD UNO";
        cambiarTexto("jumbotronHeader", "descripcionJumbotronHeader", titulo, descripcion);

    } else if (elemento == "nada") {
        var titulo = "Título Súper Chulo";
        var descripcion = "Cáncer es el nombre común que recibe un conjunto de enfermedades relacionadas en las que se observa un proceso descontrolado en la división de las células del cuerpo";
        cambiarTexto("jumbotronHeader", "descripcionJumbotronHeader", titulo, descripcion);

    } else if (elemento == "card2") {
        var titulo = "Card 2";
        var descripcion = " CARD DOS Cáncer es el nombre común que recibe un conjunto de enfermedades relacionadas en las que se observa un proceso descontrolado en la división de las células del cuerpo";
        cambiarTexto("jumbotronHeader", "descripcionJumbotronHeader", titulo, descripcion);
        
    } else if (elemento == "card3") {
        var titulo = "Card 3";
        var descripcion = "CARD 3 Cáncer es el nombre común que recibe un conjunto de enfermedades relacionadas en las que se observa un proceso descontrolado en la división de las células del cuerpo";
        cambiarTexto("jumbotronHeader",
        "descripcionJumbotronHeader",
        titulo,
        descripcion);

    } else if (elemento == "jumbo1") {
        var titulo = "Titulo del elemento1"
        var descripcion = "Subtitulo del elm1"
        var textoLargo = "Texto largo del el1"
        cambiarTexto("jumbotitle",
            "jumbosubtitle",
            titulo,
            descripcion,
            "jumbotext", textoLargo);

    } else if (elemento == "jumbo2") {
        var titulo = "Titulo del elemento2"
        var descripcion = "Subtitulo del elm2"
        var textoLargo = "Texto largo del el2"
        cambiarTexto("jumbotitle",
            "jumbosubtitle",
            titulo,
            descripcion,
            "jumbotext", textoLargo);
    } else if (elemento == "jumbo3") {
        var titulo = "Titulo del elemento3"
        var descripcion = "Subtitulo del elm3"
        var textoLargo = "Texto largo del el3"
        cambiarTexto("jumbotitle",
            "jumbosubtitle",
            titulo,
            descripcion,
            "jumbotext", textoLargo);
    }
}

function cambiarTexto(elemento1, elemento2, titulo, descripcion, elemento3, textolargo) {
    document.getElementById(elemento1).innerHTML = titulo;
    document.getElementById(elemento2).innerHTML = descripcion;
    if (elemento3 != null || elemento3 != undefined) {
        document.getElementById(elemento3).innerHTML = textolargo;
    }
}
