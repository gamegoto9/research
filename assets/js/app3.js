(function() {

    var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'ControllersApp']);
    app.config(function($routeProvider,$locationProvider) {
        $routeProvider.
                when('/sports', {
                    templateUrl: 'default_'
                   
                }).
                when('/view/:id/:sportId', {
                    templateUrl: 'Regis_foot', 
                    controller: 'viewController'
                }).
                otherwise({redirectTo: '/'})
    });
    
//    app.controller('Ctrl',function($scope) {
//            
//    });
})();