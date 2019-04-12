var miAplicacion = angular.module('miAplicacion', []);

miAplicacion.controller('mainController', ["$scope", "$http", function ($scope, $http) {

    $http({
            url: "controlador/controlador_consulta_ikasle_ziklo.php",
            method: "GET"
        })
        .then(function (res) {
            $scope.lista = res.data;
            $scope.VerMenu = true;
        }, function (error) {
            console.log(error);
        });
    
    $scope.Iniciaragregar = function (){
        // $scope.VerMenu = false;
        $scope.verAgregaralumno = true;
    };
    $scope.agregar = function (){
        var nombre = $scope.misdatos.nombre;
        var apellido1 = $scope.misdatos.apellido1;
        var apellido2 = $scope.misdatos.apellido2;
        var curso = $scope.misdatos.curso;
        var ciclo = $scope.misdatos.ciclo;
        var id_ziklo = $scope.misdatos.id_ziklo;
        $http({
            url: "controlador/controlador_insertar_ikasleak.php",
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            data: "nombre=" + nombre + "&apellido1=" + apellido1 + "&apellido2=" + apellido2 + "&curso=" + curso + "&ciclo=" + ciclo + "&id_ziklo=" + id_ziklo,
        })
        .then(function () {
            alert("Alumnos añadido");
        }, function (error) {
            console.log(error);
        })
    };
    
    $scope.Eliminarlista = function () {
        var x = false;
        x = confirm("Quieres borrar todos los alumnos?");
        
        if (x) {
            $scope.lista.forEach(aux => {
                $http({
                    url: "controlador/controlador_borrar_ikasle.php",
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    data: "value=" + aux.id
                })
                .then(function () { 
                    
                }, function (error) {
                    console.log(error);
                })
            });
        }
        alert("Alumnos eliminados");
    };
    $scope.eliminar = function (x) {
        $scope.lista.forEach(aux => {
            $http({
                url: "controlador/controlador_borrar_ikasle.php",
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: "value=" + x
            })
            .then(function () {
                
            }, function (error) {
                console.log(error);
            })
        });
        alert('Alumno eliminado');
    };
    
    $scope.modificar = function () {
        var id = $scope.misdatos.id;
        var nombre = $scope.misdatos.nombre;
        var apellido1 = $scope.misdatos.apellido1;
        var apellido2 = $scope.misdatos.apellido2;
        var ciclo = $scope.misdatos.izen_ziklo;
        var curso = $scope.misdatos.curso;
        var id_ziklo = $scope.misdatos.id_ziklo;
        $http({
            url: "controlador/controlador_modificar_ikasle.php",
            method: "POST",
            headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
            data: "id=" + id + "&nombre=" + nombre + "&apellido1=" + apellido1 + "&apellido2=" + apellido2 + "&curso=" + curso + "&ciclo=" + ciclo + "&id_ziklo=" + id_ziklo,

            })
            .then(function () {
        
                }, function (error) {
                        console.log(error);
                    })
            alert('Alumno modificado');
    };
    
    $scope.Buscar = function () {
        $scope.VerFormBusqueda = true;
    };
    $scope.verMod = function (item) {
        $scope.misdatos = item;
        $scope.VerMenu = false;
        $scope.verModificaralumno = true;
    };
    $scope.finbuscar = function () {
        $scope.VerFormBusqueda = false;
    };
    
    
}]);
                    