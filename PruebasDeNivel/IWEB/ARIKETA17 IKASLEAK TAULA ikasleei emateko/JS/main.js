$(document).ready(function () {
    menuActivo();
    viewLista();
    cargarSelect();
    viewFormMod();
    modificarIkasle();
});

function menuActivo() {
    $('.opcion').click(function () {
        var id = $(this).attr('id');
        $('.dcha>div').css("display","none");
        $('#zona'+id).css("display","block");
    });
}

function viewLista() {
    $('#View').click(function () {
       $.ajax({
           url: "../ajax/viewAll.php",
           type: "GET",
           dataType: "json",
           success: function (datos) {
               viewAll(datos)
           },
           error: function (error) {
               console.log("viewLista.php ---->");
               console.log(error);
           }
       });
    });
}

function viewAll(datos) {
    $('.tablaView>tbody').html("");
    datos.forEach(aux => {
        var alumno = "<tr><td>" + aux['id'] + "</td><td>" + aux['Nombre'] + "</td><td>" + aux['Edad'] + "</td><td>" + aux['Curso'] + "</td></tr>";

        $('.tablaView>tbody').append(alumno);
    });
}

function cargarSelect() {
    $.ajax({
        url: "../ajax/select.php",
        type: "GET",
        dataType: "json",
        success: function (datos) {
            viewSelect(datos)
        },
        error: function (error) {
            console.log("viewLista.php ---->");
            console.log(error);
        }
    });
}

function viewSelect(datos) {
    datos.forEach(aux => {
        var option = "<option value=\""+ aux['id'] +"\">"+ aux['Nombre'] +"</option>"
        $('select').append(option);
    });
}

function viewFormMod() {
    $('#modificarAlumno').click(function () {
        var id = $('#sel-modificar').val();
        $.ajax({
            url: "../ajax/alumnoPorId.php",
            type: "POST",
            data: {"id":id},
            dataType: "json",
            success: function (datos) {
                rellenarForm(datos);
            },
            error: function (error) {
                alert("Error");
            }
        });

        
    });
}

function rellenarForm(datos) {
    // console.log($(datos));

    $("#modNombre").val(datos['Nombre']);
    $("#modEdad").val(datos["Edad"]);
    $("#modCurso").val(datos["Curso"]);
    $('.dcha>div').css("display", "none");
    $('#formMod').css("display", "block");
}

function modificarIkasle() {
    $('#guardarMod').click(function () {
        var id = $("#sel-modificar").val();
        var nombre = $("#modNombre").val();
        var edad = $("#modEdad").val();
        var curso = $("#modCurso").val();
        console.log(id);
        $.ajax({
            url: "../ajax/modAlumno.php",
            type: "POST",
            data: {"id":id,"nombre": nombre, "edad": edad, "curso": curso},
            dataType: "json",
            success: function (datos) {
                alert("Modificado Bien!");
            },error: function (error) {
                alert(error);
            }
        });
    })
    
}