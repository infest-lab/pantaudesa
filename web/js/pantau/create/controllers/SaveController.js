createPantauApp.controller('SaveController', ['$scope','$http', 'formCreate', function($scope,$http, formCreate){
	$scope.config = formCreate.getConfig();

    $scope.simpanPantau = function(){
    	formData = formCreate.getData();
        _formData = {
            kode_provinsi   : angular.fromJson(formData.wilayah.provinsi).kode_provinsi,
            provinsi        : angular.fromJson(formData.wilayah.provinsi).nama_provinsi,         
            kode_kabupaten  : angular.fromJson(formData.wilayah.kabupaten).kode_kabupaten,
            kabupaten       : angular.fromJson(formData.wilayah.kabupaten).nama_kabupaten,
            kode_kecamatan  : angular.fromJson(formData.wilayah.kecamatan).kode_kecamatan,
            kecamatan       : angular.fromJson(formData.wilayah.kecamatan).nama_kecamatan,
            kode_desa       : angular.fromJson(formData.wilayah.desa).kode_desa,
            desa            : angular.fromJson(formData.wilayah.desa).nama_desa,
            is_kelurahan    : formData.is_kelurahan,
            alamat          : formData.alamat,
            method          : formData.method,            
            content         : formData.content
        }
    	console.log(_formData);
        $http.post($scope.config.saveUrl,{Pantau:_formData})
        .success(function(data){
            console.log(data)
            if(data.status === 'success'){
                //window.location.href = '/pantau/view?id='+data.data_id;
                window.location.href = data.redirect;
            }
        })
    }
}])