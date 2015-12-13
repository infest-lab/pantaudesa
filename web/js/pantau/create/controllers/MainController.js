createPantauApp.controller('MainController', ['$scope','$http', 'formCreate', function($scope,$http, formCreate){
	$scope.config = {
		url: null
	}
	$scope.init = function(config){
    	angular.extend($scope.config, config);
    	formCreate.setConfig(config);
    	if(typeof $scope.config.url !== 'undefined'){
    		//$scope.getProvinsi();
    		console.log(formCreate.getConfig());
    	}else{
    		console.error('URL harus terisi');
    	}    	
    }
}])