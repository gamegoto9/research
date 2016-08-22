(function() {



    var app = angular.module('ControllersApp', ['ngRoute', 'ngAnimate']);


    app.controller('RootCtrl', function($scope, $http) {
        $http({
            method: 'POST',
            url: 'listAllsport',
            headers: {"Content-Type": "application/json"},
        }).success(function(data) {
            $scope.rows = data;
        })
    });
    
    app.controller('PlayerListCtrl',['$scope', '$routeParams','$http',function($scope, $routeParams, $http) {
        
            var idParam = $routeParams.sportId;
            
            
            
            $http({
            method: 'POST',
            url: 'listPlayer/'+idParam,
            headers: {"Content-Type": "application/json"},
        }).success(function(data) {
            $scope.players = data;
        })
        
        
        
    }]);
    
    
    
    app.controller('viewController', ['$scope', '$routeParams','$http', function($scope, $routeParams, $http) {
            
            
                
            $scope.row = $scope.rows[$routeParams.id]
            $scope.titles = [{
                    value: 'Mr.',
                    label: 'Mr.'
                }, {
                    value: 'Miss.',
                    label: 'Miss.'
                }, {
                    value: 'Ms.',
                    label: 'Ms.'
                }, {
                    value: 'Mrs.',
                    label: 'Mrs.'
                }];


            $scope.stdTypes1 = {
                stdTypes1: "This is a test question.",
                stdTypes: [{
                        id: 01,
                        text: "Choice 1",
                        isUserAnswer: "false"
                    }, {
                        id: 02,
                        text: "Choice 2",
                        isUserAnswer: "true"
                    }]
            };

            


            $scope.submitForm = function() {
                $scope.name = "aaaaaa";
	    $scope.lname = "nnnnnnn";
                
                console.log($scope.name);
                
                $http({
                    method: 'POST',
                    url: 'add',
                    headers: {
                        "Content-Type": "application/json"
                    },
                    data: JSON.stringify({name: $scope.name, lname: $scope.lname})
                }).success(function(data) {
                    var scope = angular.element(document.getElementById("table")).scope();
                    scope.players.push({
                        nastdID: $scope.name, 
                        stdName: $scope.name,
                        sportId: $scope.lname,
                        passportId: '',
                        nation: '',
                        typeId: ''
                    
                });
                    $scope.players = scope;

                    alertify.notify(data.message, data.status, 5, function() {
                        console.log(data.message);
                        console.log($scope.name);
                    });

                    //console.log(data);
                    // $scope.message = data.status;
                });
            }


        }]);



})();