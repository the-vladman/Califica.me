var MyApp = angular.module('MyApp', []);

/*******************************************
                Config APP
********************************************/

MyApp.config(
        function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });


/*******************************************
            Preview Controller
********************************************/

MyApp.controller('PreviewCtrl', function($scope) {

    $scope.titulo = "";
    $scope.link = "";
    $scope.text = "";
    $scope.ima = "http://placehold.it/250x300" ;
    $scope.charts = 250;

    $scope.count = function(){
        var count = $scope.charts - $scope.text.length; 
        return count;
    }
    $scope.click = function(){
        $('#file-1').change( function(event) {
            $scope.ima = URL.createObjectURL(event.target.files[0])+"";
            $("#image-prev").fadeIn("fast").attr('src',$scope.ima);
        });
    }
});


// /**********************************************************************************************************
//  priceFilter
// **********************************************************************************************************/
// app.filter("priceFilter", function() {
//     return function(input) {
//         if (input > 0){
//             return "+ $"+input;
//         };
//         if (input == 0){
//             return "Incluido";
//         };
//         if (input < 0){
//             return "Consulte al Probedor";
//         };
//     };
// });