function dia() {
    var f = new Date();

    var d = f.getDay();

    var dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];

    alert("Hoy es "+ dias[d]);
}