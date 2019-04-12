var miApp=angular.module('miApp',[]);
    miApp.controller('miControlador', function ($scope, $http){
        $scope.VerResultados = "false";

        $scope.visuals = [];

        $http.get('json/datoscombo1.json').then(function (data) {
            $scope.visuals = data.data;
        });
    });