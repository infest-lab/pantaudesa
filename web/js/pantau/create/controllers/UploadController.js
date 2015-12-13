createPantauApp.controller('UploadController', ['$scope','$http', 'formCreate', function($scope,$http, formCreate){
	$scope.config = formCreate.getConfig();
}])