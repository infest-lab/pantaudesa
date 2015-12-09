var app = angular.module('ModuleWilayah', [] );
app.controller('Wilayah',function($scope,$http){
	$scope.provinsis = []
	$scope.kabupatens = []
	$scope.kecamatans = []
	$scope.desas = []
	$scope.type = 'url'
	$scope.formData = {};
	via()
	$http.get(site_url+'/wilayah/provinsi', {}).then(function(data){
		$scope.provinsis = data.data
	}, function(error){

	});
	$scope.submit = function() {   
        console.log($scope.formData);
        return false;
    };
	$scope.getKabupaten = function(input){
		var json = angular.fromJson(input)
		$scope.kabupatens = []
		$scope.kecamatans = []
		$scope.desas = []
		$http.get(site_url+'/wilayah/kabupaten?kode='+json.kode_provinsi, {}).then(function(data){
			$scope.kabupatens = data.data
		}, function(error){

		});
	}
	$scope.getkecamatan = function(input){
		var json = angular.fromJson(input)
		$scope.desas = []
		$http.get(site_url+'/wilayah/kecamatan?kode='+json.kode_kabupaten, {}).then(function(data){
			$scope.kecamatans = data.data
		}, function(error){

		});
	}
	$scope.getDesa = function(input){
		var json = angular.fromJson(input)
		$http.get(site_url+'/wilayah/desa?kode='+json.kode_kecamatan, {}).then(function(data){
			$scope.desas = data.data
		}, function(error){

		});
	}
	$scope.changeType = function(type){
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
	}

})