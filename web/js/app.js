  var app = angular.module('app',  ['ngFileUpload']);
app.controller('ControllerUpload', ['$scope' , 'Upload' , function($scope , Upload){
     $scope.$watch('file', function (data) {
        if (typeof data != "undefined") {
            $scope.percent = 0;
           
            $scope.upload([$scope.file]);  
        }
        
  	});
    $scope.upload = function (files) {
        if (files && files.length > 0) {
        	 
            $scope.progressHide = ''
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                Upload.upload({
                    url: 'http://localhost:8080/index.php/upload-berkas/index',
                    fields: {
                       '_csrf': 'jos'
                    },
                    file: file
                }).progress(function (evt) {
                    var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                    console.log(progressPercentage)
                    $scope.percent = progressPercentage;
                }).success(function (data, status, headers, config) {
                 /*   if (data.status  == true){
                        $scope.imagepreview = data.result.path
                        $scope.progressHide = 'hide'
                        $scope.showform = 'hide'
                        $scope.showpreview = ''
                        $scope.progressHide = 'hide'
                        setTimeout(function (){ angular.element('.preview-bukti-transaksi-close').trigger('click'); count = 2; },100);
                        
                        image = data.result.path

                    }	*/
                   
                   console.log(data)
                   // $scope.imagepreview = data
                });
            }
        }
    };
    // upload on file select or drop
  /*  $scope.upload = function (file) {
        Upload.upload({
            url: '',
            data: {file: file, 'username': $scope.username}
        }).then(function (resp) {
            console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
        }, function (resp) {
            console.log('Error status: ' + resp.status);
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
        });
    };*/
}])