$(document).ready(function () {
    var id;





    $("#ikasleGuardar").click(function () {
        $i = id;

        switch ($i) {
            case 0:
                añadir();
            case 1:
                break;
            case 2:
                borrar();
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;


        }

    });




    //cONULSTAR ALUMNOS
    $('#Ver').click(function () {
        limpiar();
        $('#zonaConsulta').show();
        functionConsultaralumnos()
        return false;

    });

    //nUEVO ALUMNO
    $('#Añadir').click(function () {
        id = parseInt($(this).attr("data-id"));
        limpiar();
        $('label').show();
        $('input').show();
        return;


    });

    //Borrar
    $('#Borrar').click(function () {
        id = parseInt($(this).attr("data-id"));
        limpiar();
       
        $('#ikasleGuardar').show();

        $('#ikasleNombresTodos').show();
        combobox();






    })

    //limpiar
    function limpiar() {
        $(".ocultar").hide();
    }


    function functionConsultaralumnos() {
        $('#zonaConsulta').html('');
        $.ajax({
            type: 'GET',
            dataType: 'Json',
            url: "../controlador/controller_consulta_ikasleak.php",
            success: function (respuesta) {



                var tabla = "<table>";
                tabla += "<th class='id'>Id</th>\n\ <th class='nombre'>Nooombre</th><th class='edad'>Edad</th>\n\
                <th class='numericoo'>Curso</th>";
               


                // midato = JSON.parse(respuesta);  /////para convertir a objeto


                $.each(respuesta, function (i, dato) {

                    tabla += "<tr>";
                    tabla += "<td class='id'>" + dato.id + "</td>";
                    tabla += "<td class='nombre'>" + dato.Nombre + "</td>";
                    tabla += "<td class='numerico'>" + dato.Edad + "</td>";
                    tabla += "<td class='numerico'>" + dato.Curso + "</td>";
                    tabla += "</tr>";
                });
                tabla += "</table>"
                $('#zonaConsulta').append(tabla).hide().fadeIn('slow');
                return false;


            },
            error: function (xhr) {
                alert("An error ocuped: " + xhr.status + "" + xhr.statusText);
            }

        })

    }

    function añadir() {

        var nombre = $("#ikasleNombre").val();
        var edad = $("#ikasleEdad").val();
        var curso = $("#ikasleCurso").val();

        var mi_alumno = {
            "nombre_alumno": nombre,
            "edad_alumno": edad,
            "curso_alumno": curso
        }

        var datosJSON = JSON.stringify(mi_alumno);

        $.ajax({
            url: "../controlador/controlador_insertar_ikasle.php",
            type: "post",
            data: {
                "datosJSON": datosJSON
            },
            success: function (respuesta) {

                alert("Alumno insertado perfectamente");
            }




        })




    }

    function combobox() {
        $('#ikasleNombresTodos').html('');

        $.ajax({
            type: 'GET',
            dataType: 'Json',
            url: "../controlador/controller_consulta_ikasleak.php",
            success: function (respuesta) {
                console.log(respuesta);


                // var miselect = "<select";
                // miselect += " < option >  < /option>";
                // $('#ikasleNombresTodos').append(miselect);


                // midato = JSON.parse(respuesta);  /////para convertir a objeto

                miselect = "";
                $.each(respuesta, function (i, dato) {

                    miselect += "<option value='" + dato.id + "'>" + dato.Nombre + "</option>";


                });

                $('#ikasleNombresTodos').append(miselect);
                return false;


            },
            error: function (xhr) {
                alert("An error ocuped: " + xhr.status + "" + xhr.statusText);
            }

        })

    }


    function borrar() {


        var id = $('#ikasleNombresTodos').val();
        alert(id);
        var mi_alumno = {
            "id": id
            
        }

        var datosJSON = JSON.stringify(mi_alumno);

        $.ajax({
            url: "../controlador/controlador_borrar_ikasle.php",
            type: "post",
            data: {
                "datosJSON": datosJSON
            },
            success: function (respuesta) {

                alert("Alumno borrador");
            }




        })

    }

});