createPantauApp.controller('ApiController', ['$scope','$http', 'formCreate', function($scope,$http, formCreate){
	$scope.config = formCreate.getConfig();
	$scope.api_url = null;	
	$scope.tahuns = [];
	$scope.ringkasan = {
		tahun: null,
		data: null
	};

	$scope.previewApi = function(){
		$scope.getPeriode();
	}

	$scope.getPeriode = function(){
		$http.get($scope.api_url+'/tahun',{})
		.success(function(data){
			$scope.tahuns = data.tahun;
			$scope.getRingkasan(data.tahun[0]);
			//return data.tahun;
		})
	}

	$scope.getRingkasan = function(tahun){
		$http.get($scope.api_url+'/ringkasan/tahun/'+tahun,{})
		.success(function(data){
			$scope.ringkasan.tahun = tahun;
			$scope.ringkasan.data = data;
			//return data;
		})
	}

}])