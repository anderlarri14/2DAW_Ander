$(document).ready(function () {

    $('#add').click(function () {
        limpiar();
        $('#zonaAdd').fadeIn('slow');
    });

    $('#view').click(function () {
        limpiar();
        functionConsultaralumnos();
        $('#zonaConsulta').fadeIn();
    });

    $('#ikasleGuardar').click(function () {
        newIkasle()
    })

    $('#del').click(function () {
        limpiar();
        $('#zonaDel').fadeIn();
        viewCombo();
    });
    $('#borrarIkasle').click(function() {
        delIkasle();
    })

    function limpiar() {
        $('.dcha>*').css("display","none");
    }

    function functionConsultaralumnos() {
        $('#zonaConsulta').html('');
        $.ajax({
            type: 'GET',
            dataType: 'Json',
            url: "../controlador/viewIkasle.php",
            success: function (respuesta) {

                var tabla = "<h1>View</h1><hr><table>";
                tabla += "<th class='id'>Id</th>\n\ <th class='nombre'>Nombre</th><th class='edad'>Edad</th>\n\
                <th class='numericoo'>Curso</th>";

                $.each(respuesta, function (i, dato) {

                    tabla += "<tr>";
                    tabla += "<td class='id'>" + dato.id + "</td>";
                    tabla += "<td class='nombre'>" + dato.Nombre + "</td>";
                    tabla += "<td class='numerico'>" + dato.Edad + "</td>";
                    tabla += "<td class='numerico'>" + dato.Curso + "</td>";
                    tabla += "</tr>";
                });
                tabla += "</table>"
                $('#zonaConsulta').append(tabla).hide().show();
                return false;


            },
            error: function (xhr) {
                alert("An error ocuped: " + xhr.status + "" + xhr.statusText);
            }

        })

    }

    function newIkasle() {
        var nombre = $('#ikasleNombre').val();
        var edad = $('#ikasleEdad').val();
        var curso = $('#ikasleCurso').val();
        
        var data = {"nombre": nombre,"edad": edad,"curso": curso};
        $.ajax({
            url: '../controlador/newIkasle.php',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function () {
                alert("Alumno insertado con éxito!");
     
            }, error: function (e) {
                console.log(e);
            }
        });
    }

    function viewCombo() {
            $('#selectDel').empty();
            $.ajax({
                type: 'GET',
                dataType: 'Json',
                url: "../controlador/viewIkasle.php",
                success: function (respuesta) {

                    var combo = "";
                    $.each(respuesta, function (i,dato) {
                        combo += "<option value=\""+ dato.id +"\">"+ dato.Nombre +"</option>"
                    });
                    
                    $('#selectDel').append(combo);

                },
                error: function (xhr) {
                    alert("An error ocuped: " + xhr.status + "" + xhr.statusText);
                }
        });
    }
    function delIkasle() {

        var id = $('#selectDel').val();
        var data = {"id":id};

        $.ajax({
            type: 'POST',
            data: data,
            url: "../controlador/delIkasle.php",
            success: function (a) {

            },
            error: function (e) {
                console.log("Error" + e);
            }
        });
        viewCombo();
    }

});