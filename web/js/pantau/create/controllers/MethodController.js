createPantauApp.controller('MethodController', ['$scope','$http', 'formCreate', function($scope,$http, formCreate){
	$scope.config = formCreate.getConfig();
	$scope.type = 'url';

	$scope.$watch('type', function(newValue, oldValue) {
    	if (newValue === oldValue) {
            return;
        }
        formCreate.setMethod(newValue);
      	//console.log(formCreate.getWilayah());
   	});
}])