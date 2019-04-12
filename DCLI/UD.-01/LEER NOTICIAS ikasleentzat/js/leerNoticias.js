var misUsuarios =["Mikel","Ane","Endika"];
var misContrasenas=["11","22","33"];
var misRoles=["usu","admin","usu"];

function showLogin() {
    document.getElementById("miLogin").style.display = "block";
}
function hideLogin() {
    document.getElementById("miLogin").style.display = "none";
}

function control() {
    
    var usuario = document.getElementById("idUsuario").value;
    var contrasena = document.getElementById("idContrasena").value;
    var existe = false;

    for (let i = 0; i < misUsuarios.length; i++) {
        const forUser = misUsuarios[i];
        const forContrasena = misContrasenas[i];
        const forRoles = misRoles[i];

        if (usuario == forUser && contrasena == forContrasena) {
            hideLogin();
            document.getElementById("miPerfil").innerHTML = usuario;
            existe = true;
            if (forRoles == "admin") {
                document.getElementById("elementos").style.display = "block";
                document.getElementById("crearNoticia").style.display = "block";

            } else {
                document.getElementById("elementos").style.display = "block";

            }
        } 
    }
    if (!existe) {
        alert("El usuario o la contraseña son incorrectos");
    }

}
function addNoticia() {
    var titulo = document.getElementById("idNoticiaNuevaTitulo").value;
    var texto = document.getElementById("idNoticiaNuevaTexto").value;

    var divNuevo = document.createElement("div");
    divNuevo.setAttribute("class", "texto");

    var nuevoH3 = document.createElement("h3");
    nuevoH3.innerHTML = titulo;
    divNuevo.appendChild(nuevoH3);

    var nuevoTexto = document.createElement("p");
    nuevoTexto.innerHTML = texto;
    divNuevo.appendChild(nuevoTexto);

    // Agregar
    document.getElementById("elementos").appendChild(divNuevo);

    // Vaciar
    document.getElementById("idNoticiaNuevaTitulo").value = "";
    document.getElementById("idNoticiaNuevaTexto").value = "";
}