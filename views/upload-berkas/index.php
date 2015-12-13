<?php
 use yii\helpers\Url;

?>
<h1>upload-berkas/index</h1>

<?php
use yii\widgets\ActiveForm;
echo Yii::$app->request->csrfParam;echo '<br/><br/>---<br/>';
echo Yii::$app->request->csrfToken;
?>
<div ng-app="app"  ng-controller="ControllerUpload" >
        Upload on form submit or button click
        <form  name="form">
          Single Image with validations
        
          <div class="btn btn-primary btn-lg" ngf-select ng-model="file" name="file" 
           ngf-max-size="20MB" ngf-min-height="100" 
            ngf-resize="{width: 100, height: 100}" >Select</div>
          Multiple files
        
        </form>

        Image thumbnail: <img ngf-thumbnail="file || '/thumb.jpg'">
        Audio preview: <audio controls ngf-src="file"></audio>
        Video preview: <video controls ngf-src="file"></video>
</div>
<?php /*$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) */ ?>

    <?php ///$form->field($model, 'imageFile')->fileInput() ?>

    <!-- <button>Submit</button> -->

<?php //ActiveForm::end() ?>

<?php

// with UI

use dosamigos\fileupload\FileUploadUI;
?>
<?php
/*FileUploadUI::widget([
    'model' => $model,
    'attribute' => 'imageFile',
    'url' => ['upload-berkas/index', 'id' => 'hae'],
    'gallery' => false,
    'fieldOptions' => [
            'accept' => 'image/*'
    ],
    'clientOptions' => [
            'maxFileSize' => 100000000
    ],
    // ...
    'clientEvents' => [
            'fileuploaddone' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
            'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
    ],
]);*/
echo $this->registerJsFile('/js/angular.min.js');
echo $this->registerJsFile('/js/ng-file-upload/ng-file-upload-shim.min.js');
echo $this->registerJsFile('/js/ng-file-upload/ng-file-upload.min.js');
echo $this->registerJsFile('/js/app.js'); 
?>
