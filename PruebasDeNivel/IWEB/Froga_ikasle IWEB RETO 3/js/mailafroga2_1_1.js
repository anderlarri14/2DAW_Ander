
 //$.ajax({url: "json/datosJSON.json", success: function (result)        //{
 //               misdatos = result;}

$(document).ready(function () {
      // event.preventDefault();  no ejecutar submit
     var height = $(window).height();
     $('body').height(height);
     $('body').css("background-color","grey");
    mostrarLogin();
    mostrarBiblioteca();
    cargarLibros();
    cargarSelectAutor()
    $('#cancelLog').click(function () {
        ocultarTodo();
    });
 }); 


function mostrarLogin() {
    $("#clickLogin").click(function () {
        ocultarTodo();
        $('#idDivLogin').css("display", "grid");
    });
}
function mostrarBiblioteca() {
    $("#clickBiblioteca").click(function () {
        ocultarTodo();
        $('#divLibros').css("display", "flex")
        $('.container').css("display", "block")
    });
}
function ocultarTodo() {
    $('#divLibros').css("display", "none")
    $('.container').css("display", "none")
    $('#idDivLogin').css("display", "none");
}
function cargarLibros() {
    $.ajax({
        url: "json/datosJSON.json",
        type: "GET",
        dataType: "json",
        success: function (datos) {
            // console.log(datos);
            viewBiblioteca(datos)
        },
        error: function (error) {
            console.log("viewLista.php ---->");
            console.log(error);
        }
    });
}
function viewBiblioteca(libros) {
    libros.forEach(aux => {
        var data = '<div class=\'libro '+aux['id']+'\'><div id=\'titulolibro\'>'+aux['titulo']+'</div>'
        data += '<img class=\"caratula\" src=\''+aux['foto']+'\' />';
        data += '<p  class=\'datoslibro\'>'+aux['autor']+'</p><br>';
        if (aux['novedad'] == "False") {
            data += '<div id=\'novedadlibro\'>Novedad</div><br>';            
        }
        data += '<div class=\'datoslibro\'>'+aux['tipo']+'</div><br>';
        data += '<p><a class=\'btn btn-default datoslibro\' href=\'#\' role=\'button\'>View details &raquo;</a></p></div>';
        
        $('#divLibros').append(data);
        
    });
    
}
function cargarSelectAutor(){
    $.ajax({
        url: "json/datosJSON.json",
        type: "GET",
        dataType: "json",
        success: function (datos) {
            console.log(datos);
            // cargarSelectAutor(datos);
            datos.forEach(aux => {
                $('#idSelectAutor').append("<option value=\"" + aux['autor'] + "\">" + aux['autor'] + "</option>")
            });
        },
        error: function (error) {
            console.log("viewLista.php ---->");
            console.log(error);
        }
    });
}

// function comprobarLogin() {
//     $('#enviarLog').click(function () {
//         var nombre = $('#username').val();
//         var pass = $('#pass').val();
//         if (username == 'ane' && pass == 'Usuario12') {
//             $('#clickBiblioteca').css("display","flex");
//         }
//     });
// }
