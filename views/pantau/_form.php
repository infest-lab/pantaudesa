<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Provinsi;
/* @var $this yii\web\View */
/* @var $model app\models\Pantau */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pantau-form" ng-app="ModuleWilayah" ng-controller="Wilayah">

    <?php $form = ActiveForm::begin( ['options'=> ['ng-submit'=> 'submit()']]); ?>
    <div class="form-group ">
        <label class="control-label" for="pantau-provinsi">Provinsi</label>
        <select  id="" ng-model="formData.provinsi" class="form-control" ng-change="getKabupaten(formData.provinsi)">
             <option ng-repeat="prov in provinsis" title="{{prov.nama_provinsi}}" ng-selected="{{prov == formData.provinsi}}" value="{{prov}}">{{prov.nama_provinsi}}</option>
        </select>
        
     
        <div class="help-block"></div>
    </div>
    <div class="hide">
        <?= $form->field($model, 'provinsi')->hiddenInput() ?>
    </div>
    <div class="hide">
        <?= $form->field($model, 'kode_provinsi') ?>
    </div>
    <div class="hide">
        <?= $form->field($model, 'kode_kabupaten') ?>
    </div>
    <div class="form-group ">
        <label class="control-label" for="pantau-provinsi">Kabupaten</label>
         <select name="" id="" ng-model="formData.kabupaten" class="form-control" ng-change="getkecamatan(formData.kabupaten)">
             <option ng-repeat="prov in kabupatens" title="{{prov.nama_kabupaten}}" ng-selected="{{prov == formData.kabupaten}}" value="{{prov}}">{{prov.nama_kabupaten}}</option>
        </select>
        <div class="help-block"></div>
    </div>
    <div class="form-group ">
        <label class="control-label" for="pantau-provinsi">Kecamatan</label>
         <select name="" id="" ng-model="formData.kecamatan" class="form-control" ng-change="getDesa(formData.kecamatan)" >
             <option ng-repeat="prov in kecamatans" title="{{prov.nama_kecamatan}}" ng-selected="{{prov == formData.kecamatan}}" value="{{prov}}">{{prov.nama_kecamatan}}</option>
        </select>
        <div class="help-block"></div>
    </div>
     <div class="form-group ">
        <label class="control-label" for="pantau-provinsi">Desa</label>
         <select name="" id="" ng-model="formData.desa" class="form-control" >
             <option ng-repeat="prov in desas" title="{{prov.nama_desa}}" ng-selected="{{prov == formData.desa}}" value="{{prov}}">{{prov.nama_desa}}</option>
        </select>
        <div class="help-block"></div>
    </div>
    
  
    
    <div class="hide">
        <?= $form->field($model, 'kecamatan') ?>
    </div>
    <div class="hide">
        <?= $form->field($model, 'desa') ?>
    </div>
    <?= $form->field($model, 'alamat')->textArea() ?>

    <?= $form->field($model, 'is_kelurahan')->checkbox() ?>
     <div class="form-group field-pantau-type">
        <label class="control-label" for="pantau-type">Type</label>
        <div id="pantau-type">
        <label><input type="radio" name="Pantau[type]" value="url" ng-model="type" ng-change="changeType(type)"> Via API</label>
        <label><input type="radio" name="Pantau[type]" value="upload" ng-model="type" ng-change="changeType(type)" > Unggah Berkas</label>
    </div>

    <div class="help-block"></div>
    </div>
    <div class="{{viaurl}}">
        <div class="form-group">
            <label for="" class="control-label">Masukan Url API</label>
            <input type="text" value="" placeholder="contoh http://mitradesa.id" class="form-control">
           <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" ng-click="ringkasan()">
              Cek
            </button>

        </div>
    </div>
    <div class="{{viaupload}}">
        <?= $form->field($model, 'periode') ?>
        <?= $form->field($model, 'tahun') ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ringkasan Keuangan Desa</h4>
      </div>
      <div class="modal-body" id="content-tinjau">
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Terverifikasi</button>
      </div>
    </div>
  </div>
</div>
</div>
<?php 
    echo $this->registerJsFile('/js/angular.min.js');
    echo $this->registerJsFile('/js/wilayah.js'); 
    echo $this->registerJsFile('/js/ringkasan.js'); 
 ?>
