
var miAplicacion = angular.module('miAplicacion', []);

miAplicacion.controller('mainController', ["$scope", "$http", function($scope, $http) {

    //////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////
    $scope.listaARTICULOS = [
        {"id": "1", "nombre": "Boli", "Precio": 2, "StockMinimo": 40, "Stock": 56},
        {"id": "2", "nombre": "Cuaderno", "Precio": 4, "StockMinimo": 50, "Stock": 20},
        {"id": "3", "nombre": "Boli", "Precio": 2, "StockMinimo": 45, "Stock": 56},
        {"id": "4", "nombre": "Goma", "Precio": 2, "StockMinimo": 100, "Stock": 56},
        {"id": "5", "nombre": "Cartulina", "Precio": 1, "StockMinimo": 30, "Stock": 56},
        {"id": "6", "nombre": "Tijeras", "Precio": 6, "StockMinimo": 45, "Stock": 56},
        {"id": "7", "nombre": "Rotulador", "Precio": 3, "StockMinimo": 40, "Stock": 56},
        {"id": "8", "nombre": "Reglas", "Precio": 7, "StockMinimo": 40, "Stock": 60},
        {"id": "9", "nombre": "Compas", "Precio": 9, "StockMinimo": 20, "Stock": 10},
        {"id": "10", "nombre": "Estuche", "Precio": 3, "StockMinimo": 0, "Stock": 0},
        {"id": "11", "nombre": "Mochila", "Precio": 15, "StockMinimo": 40, "Stock": 56}
    ];

    $scope.listaUSUARIOS = [
        {"idUsuario": '1', "NombreUsuario": 'Kepa', "Tipo": 'VIP'},
        {"idUsuario": '2', "NombreUsuario": 'Miren', "Tipo": 'BASICO'},
        {"idUsuario": '3', "NombreUsuario": 'Aitor', "Tipo": 'ADMIN'}
    ];
    
    //Cambia de ventana
    $scope.cVentana = function (eleccion) {
        if ("view" == eleccion) {
            $scope.zonaIkasleak = true;
            $scope.zonaCompra = false;
            $scope.zonaAdmin = false;
        } else if ("add" == eleccion){
            $scope.zonaIkasleak = false;
            $scope.zonaCompra = true;
            $scope.zonaAdmin = false;
        }else if ("admin" == eleccion) {
            $scope.zonaIkasleak = false;
            $scope.zonaCompra = false;
            $scope.zonaAdmin = true;
            
        }
    };

    //Compruebo si al pulsar en el boton de posible el stock es mayor a la cantidad introducida
    $scope.posible = function () {
        if ($scope.comboArticulos.Stock >= $scope.cantidad && $scope.cantidad > 0) {
            alert("La compra es posible.");
        } else  {
            alert("No hay suficiente stock en el almacén!");
        }
    }

    //Una alerta al clickar en el boton de editar
    $scope.editar = function () {
        alert("Se ha modificado el registro.");
    }
    
    //se elimina el elemento borrandose del array
    $scope.eliminar = function (i){
        if ($scope.listaARTICULOS[i].Stock == 0) {
            var respuesta;
            respuesta = confirm("Seguro que quieres borrar?")
            if (respuesta == true) {
                $scope.listaARTICULOS.splice(i,1);
            }
        } else {
            alert("No se puede eliminar si el stock no es 0");
        }
    }
    
    }]);


