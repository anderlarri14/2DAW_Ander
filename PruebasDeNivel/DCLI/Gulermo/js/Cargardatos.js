var app = angular.module('miAplicacion', []);




app.controller('mainController', ['$scope', '$http', function ($scope, $http) {
    $scope.misdatos = {

        id: "",
        nombre: "",
        apellido1: "",
        apellido2: "",
        id_ziklo: "",
        Curso: ""
    }


    $scope.VerMenu = 'true';

    $http.get('controlador/controlador_consulta_ikasle_ziklo.php').success(function (data) {
        $scope.lista = data;


    })

    //FUNCION PARA CARGAR LA LISTA DE NUEVO CON LOS DATOS CARGADOS ------------------------------------------------------------

    $scope.inicializar = function () {
        $http.get('controlador/controlador_consulta_ikasle_ziklo.php').success(function (data) {
            $scope.lista = data;

        });



    }
    //fUNCION PARA ELIMINAR ALUMNO ------------------------------------------------------------

    $scope.eliminar = function (row, id) {

        if (confirm("¿Seguro que desea eliminar?")) {

            $scope.lista.splice(row, 1);
            $scope.persona_borrar = parseInt(id);


            $http({
                url: "controlador/controlador_borrar_ikasle.php",
                method: "GET",
                params: {
                    value: $scope.persona_borrar
                }
            }).then(function (responde) {

            });
        }

    };

    //CARGAR EL FORMULARIO PARA AGREGAR NUEVO ALUMNO ------------------------------------------------------------
    $scope.Iniciaragregar = function () {

        $scope.verAgregaralumno = 'true';
        $scope.VerMenu = '';

        $http.get('controlador/controlador_consulta_zikloak.php').success(function (ciclos) {
            $scope.listaziklos = ciclos;


        });
    }

    //FUNCION PARA INSERTAR ALUMNO NUEVO------------------------------------------------------------


    $scope.agregar = function () {

        $scope.misdatos.id = "0";
        $scope.misdatos.id_ziklo = $scope.ziklo_select.id_ziklo;
        var listaguardar = $scope.misdatos;
        var listaguardar = JSON.stringify(listaguardar);
        alert(listaguardar);
        $http({
            url: "controlador/controlador_insertar_ikasleak.php",
            method: "GET",
            params: {
                value: listaguardar
            }
        }).success(function (response) {
            alert(response)
            $scope.misdatos.id = response;


            $scope.lista.push({
                id: $scope.misdatos.id,
                nombre: $scope.misdatos.nombre,
                apellido1: $scope.misdatos.apellido1,
                apellido2: $scope.misdatos.apellido2,
                ciclo: $scope.misdatos.ciclo,
                idciclo: $scope.misdatos.id_ziklo
            })

            $scope.misdatos.id = '';
            $scope.misdatos.nombre = '';
            $scope.misdatos.apellido1 = '';
            $scope.misdatos.apellido2 = '';
            $scope.misdatos.ciclo = '';
            $scope.misdatos.id_ziklo = '';

        })
        //Carga otra vez la lista con los datos insertado
        $scope.inicializar();
     

    }
//FUNCION PARA MODIFICAR------------------------------------------------------------
    $scope.modificar = function (dato) {
        
        $scope.verModificaralumno = 'true';
        $scope.verAgregaralumno ='';
        

        $scope.misdatos.id = dato.id;
        $scope.misdatos.nombre = dato.nombre;
        $scope.misdatos.apellido1 = dato.apellido1;
        $scope.misdatos.apellido2 = dato.apellido2;
        $scope.misdatos.id_ziklo = dato.ziklo_select;
        $scope.misdatos.Curso = dato.Curso;
        $scope.ziklo_select.id_ziklo =dato.id_ziklo;
        $http.get('controlador/controlador_consulta_zikloak.php').success(function (datos) {
            $scope.listaziklos = datos;


        });
        $scope.VerMenu = '';

    }

    $scope.modificarboton = function (){
        
        
        $scope.misdatos.id_ziklo = $scope.ziklo_select.id_ziklo;
 var listaguardar = $scope.misdatos;
 var listaguardar = JSON.stringify(listaguardar);
 alert(listaguardar);
 $http({
     url: "controlador/controlador_modificar_ikasle.php",
     method: "GET",
     params: {
         value: listaguardar
     }
 }).success(function (response) {
     alert(response)
     $scope.misdatos.id = response;
     
     
$scope.lista.push({
    id: $scope.misdatos.id,
    nombre: $scope.misdatos.nombre,
    apellido1: $scope.misdatos.apellido1,
    apellido2: $scope.misdatos.apellido2,
    ciclo: $scope.misdatos.ciclo,
    idciclo: $scope.misdatos.id_ziklo


    
})


      $scope.inicializar();
      

 })
 //Carga otra vez la lista con los datos insertado





    }



    $scope.cancelar = function(){

        $scope.VerMenu='true';
        $scope.verModificaralumno='false';
        $scope.verAgregaralumno = 'false';

    }
    







}]);