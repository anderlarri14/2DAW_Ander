var miApp=angular.module('miApp',[]);
    miApp.controller('miControlador', function($scope, $http){
        $scope.VerResultados="false";
        
        $scope.visuals = [];
        
        $http.get('json/datoscombo1.json').then(function (data) {
            $scope.visuals = data.data;
        });

        $http.get('json/datoscombo_comic.json').then(function (data) {
            $scope.visuals = data.data;
        });

        
        // $scope.camposelect={
        //     id:"",
        //     tipo:"",
        //     formato:""
        // };

        // $scope.PasarValor=function(){
        //     $scope.VerResultados="true";
        //     $scope.ListaSelecionados.push({
        //         titulo: $scope.camposelect.titulo,
        //         auto: $scope.camposelect.autor,
        //         tipo: $scope.camposelect.tipo});
        // };

        // $scope.Limpiar=function() {
        //     $scope.ListaSelecionados= [];
        //     $scope.VerResultados='false';
        // }
    });