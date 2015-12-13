createPantauApp.controller('WilayahController', ['$scope','$http', 'formCreate', function($scope,$http, formCreate){
	$scope.config = {
		url: null
	}
	$scope.provinsis = []
	$scope.kabupatens = []
	$scope.kecamatans = []
	$scope.desas = []
	$scope.type = 'url'
	$scope.formData = {};
	//via()
	/*$http.get(site_url+'/wilayah/provinsi', {}).then(function(data){
		$scope.provinsis = data.data
	}, function(error){
		console.log(error);
	});
	$scope.submit = function() {   
        console.log($scope.formData);
        return false;
    };*/

    
    $scope.init = function(){
    	angular.extend($scope.config, formCreate.getConfig());
    	if(typeof $scope.config.url !== 'undefined'){
    		$scope.getProvinsi();
    	}else{
    		console.error('URL harus terisi');
    	}
    	
    }
    $scope.getProvinsi = function(){
    	$http.get($scope.config.url+'/wilayah/provinsi', {}).then(function(data){
			$scope.provinsis = data.data
		}, function(error){
			console.log(error);
		});
    }
	$scope.getKabupaten = function(input){
		var json = angular.fromJson(input)
		$scope.kabupatens = []
		$scope.kecamatans = []
		$scope.desas = []
		$http.get($scope.config.url+'/wilayah/kabupaten?kode='+json.kode_provinsi, {}).then(function(data){
			$scope.kabupatens = data.data
		}, function(error){
			console.log(error);
		});
	}
	$scope.getKecamatan = function(input){
		var json = angular.fromJson(input)
		$scope.desas = []
		$http.get($scope.config.url+'/wilayah/kecamatan?kode='+json.kode_kabupaten, {}).then(function(data){
			$scope.kecamatans = data.data
		}, function(error){
			console.log(error);
		});
	}
	$scope.getDesa = function(input){
		var json = angular.fromJson(input)
		$http.get($scope.config.url+'/wilayah/desa?kode='+json.kode_kecamatan, {}).then(function(data){
			$scope.desas = data.data
		}, function(error){
			console.log(error);
		});
	}
	/*$scope.changeType = function(type){
		console.log(type)
		via()
	}
	function via(){
		switch ($scope.type) {
			case 'url' :
				$scope.viaurl = '';
				$scope.viaupload = 'hide';
			break;
			case 'upload':
				$scope.viaurl = 'hide';
				$scope.viaupload = '';
			break;
		}
	}
	$scope.ringkasan = function(){

		$http.get(site_url+'/pantau/tinjau', {}).then(function(data){
			jQuery('#content-tinjau').html(data.data)
			angular.bootstrap(jQuery("#tab-panel"), ["ModuleRingkasan"]);
		}, function(error){

		});
	}
	$scope.selectTahun = function(tahun){
		console.log(tahun)
	}*/

}])