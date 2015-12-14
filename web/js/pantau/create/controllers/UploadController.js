createPantauApp.controller('UploadController', ['$scope','$http', 'formCreate', 'FileUploader', function($scope,$http, formCreate, FileUploader){
	$scope.config = formCreate.getConfig();
	$scope.formData = [];

	$scope.init = function(upload_url){
		$scope.uploader = new FileUploader({
	        url: upload_url
	    });
	    // FILTERS

	    $scope.uploader.filters.push({
	        name: 'customFilter',
	        fn: function(item /*{File|FileLikeObject}*/, options) {
	            return this.queue.length < 10;
	        }
	    });

	    // CALLBACKS
	    $scope.uploader.onSuccessItem = function(fileItem, response, status, headers) {
	    	$scope.formData.push(response.data);
	    	//console.log(fileItem);
	    	//console.log(response);
	        //console.info('onSuccessItem', fileItem, response, status, headers);
	    };
	    $scope.uploader.onCancelItem = function(fileItem, response, status, headers) {
	        console.info('onCancelItem', fileItem, response, status, headers);
	    };

	    $scope.$watchCollection('formData', function(newValue, oldValue) {
	    	if (newValue === oldValue) {
	            return;
	        }
	        formCreate.setContent({files:newValue});
	      	//console.log(formCreate.getWilayah());
	   	});

	    /*$scope.uploader.onWhenAddingFileFailed = function(item, filter, options) {
	        console.info('onWhenAddingFileFailed', item, filter, options);
	    };
	    $scope.uploader.onAfterAddingFile = function(fileItem) {
	        console.info('onAfterAddingFile', fileItem);
	    };
	    $scope.uploader.onAfterAddingAll = function(addedFileItems) {
	        console.info('onAfterAddingAll', addedFileItems);
	    };
	    $scope.uploader.onBeforeUploadItem = function(item) {
	        console.info('onBeforeUploadItem', item);
	    };
	    $scope.uploader.onProgressItem = function(fileItem, progress) {
	        console.info('onProgressItem', fileItem, progress);
	    };
	    $scope.uploader.onProgressAll = function(progress) {
	        console.info('onProgressAll', progress);
	    };
	    $scope.uploader.onSuccessItem = function(fileItem, response, status, headers) {
	    	console.info('onSuccessItem', fileItem, response, status, headers);
	    };
	    $scope.uploader.onErrorItem = function(fileItem, response, status, headers) {
	        console.info('onErrorItem', fileItem, response, status, headers);
	    };
	    $scope.uploader.onCancelItem = function(fileItem, response, status, headers) {
	        console.info('onCancelItem', fileItem, response, status, headers);
	    };
	    $scope.uploader.onCompleteItem = function(fileItem, response, status, headers) {
	        console.info('onCompleteItem', fileItem, response, status, headers);
	    };
	    $scope.uploader.onCompleteAll = function() {
	        console.info('onCompleteAll');
	    };
	    $scope.uploader.onComplete = function(response, status, headers){
	    	console.log(response);
	    };
	    console.info('uploader', $scope.uploader);*/
	}

    

    
}])