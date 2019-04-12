var miApp = angular.module('miApp', []);
miApp.controller('miControlador', function ($scope, $http) {


    // $http.get('../controlador/controlador_consulta_ikasle_ziklo.php').then(function (data) {
    //     $scope.ikasleak = data.data;
    // });
    // $http.get("../controlador/controlador_consulta_ikasle_ziklo.php")
    // .success(function(respuesta){
    //     console.log(respuesta);
       
    // });

        $http({
                url: "controlador/controlador_consulta_ikasle_ziklo.php",
                method: "GET"
            })
            .then(function (data) {
                console.log("EEE"+data);
                $scope.ikasleak = data.data;
            }, function (error) {
                console.log(error);
            });
    // $scope.prueba = function () {
    //     $http.get('json/datoscombo_' + $scope.combo1.tipo + '.json').then(function (data) {
    //         $scope.seleccionado = data.data;
    //     });
    // }


});