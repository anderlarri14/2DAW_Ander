var miApp = angular.module('miApp', []);
miApp.controller('miControlador', function ($scope, $http) {
    $scope.visuals = [];
    $scope.seleccionado = [];

    $http.get('json/datoscombo1.json').then(function (data) {
        $scope.visuals = data.data;
    });

    $scope.prueba = function () {
        $http.get('json/datoscombo_' + $scope.combo1.tipo + '.json').then(function (data) {
            $scope.seleccionado = data.data;
        });
    }

});