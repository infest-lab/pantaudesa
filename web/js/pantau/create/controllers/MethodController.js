createPantauApp.controller('MethodController', ['$scope','$http', 'formCreate', function($scope,$http, formCreate){
	$scope.config = formCreate.getConfig();
	$scope.type = 'url';
}])