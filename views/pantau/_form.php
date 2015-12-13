<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Provinsi;
use dosamigos\fileupload\FileUploadUI;
use app\assets\AngularAsset;
use app\assets\CreatePantauAsset;
/* @var $this yii\web\View */
/* @var $model app\models\Pantau */
/* @var $form yii\widgets\ActiveForm */

//app\assets\CreatePantauAsset::register($this);
?>

<div class="pantau-form" ng-app="CreatePantu">

    <?php $form = ActiveForm::begin(); //['options'=> ['ng-submit'=> 'submit()']]?>
    <?php $config = Json::encode(['url'=>Url::base(true).Url::home()]);?>
    <div ng-controller="MainController" ng-init='init(<?=$config?>)'></div>
    <div class="row">
      <div class="col-md-5">
        <h3>Pilih Desa</h3>
        <!-- begin:WilayahController -->
        <div ng-controller="WilayahController" ng-init="init()">
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
               <select name="" id="" ng-model="formData.kabupaten" class="form-control" ng-change="getKecamatan(formData.kabupaten)">
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
        </div>
        <!-- end:WilayahController -->
      </div>
      <div class="col-md-7">
        <!-- begin:MethodController -->
        <div ng-controller="MethodController">
          <h3>Pilih Cara</h3>
          <div class="form-group field-pantau-type">
            <label class="control-label" for="pantau-type">Type</label>
            <div id="pantau-type">
            <label><input type="radio" name="Pantau[type]" value="url" ng-model="type" ng-checked="type == 'url'"> Via API</label>
            <label><input type="radio" name="Pantau[type]" value="upload" ng-model="type" ng-checked="type == 'upload'"> Unggah Berkas</label>
          </div>

          <div class="help-block"></div>

          <!-- begin:ApiController -->
          <div ng-controller="ApiController">
              <div class="form-group" ng-show="$parent.type == 'url'">
                  <label for="" class="control-label">Masukan Url API</label>
                  <div class="input-group">
                    <input ng-model="api_url" type="text" value="" placeholder="contoh http://namadesa.mitradesa.id/api/keuangan" class="form-control">
                    <!-- Button trigger modal -->
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" ng-click="previewApi()">
                        Periksa
                      </button>
                    </div>
                  </div>                
                  
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog  modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Ringkasan Keuangan Desa</h4>
                        </div>
                        <div class="modal-body" id="content-tinjau">
                          <div id="tab-panel">
                                <ul class="nav nav-tabs" role="tablist">
                                  <li ng-repeat="tahun in tahuns" role="presentation" ng-click="getRingkasan(tahun)" ng-class='{active:$first}'><a href="#{{tahun}}" aria-controls="{{tahun}}" role="tab" data-toggle="tab">{{tahun}}</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                  <div role="tabpanel" class="tab-pane active" >
                                      <div class="row">
                                        <div class="col-md-6">
                                          <h3>Rencana Anggaran. {{ringkasan.tahun}}</h3>
                                          <hr>
                                          <h4 class="text-success">BESARAN BERDASARKAN BIDANG</h4>
                                          <div class="raw">                                          
                                            <div class="col-md-12" ng-repeat="belanja in ringkasan.data.bidang_belanja">
                                              <h1>{{belanja.text}}</h1>
                                              <p>{{belanja.bidang}}</p>
                                            </div>                                            
                                          </div>
                                          <br/><br/>
                                          <h4 class="text-success"> BESARAN BERDASARKAN JENIS BELANJA</h4>
                                          <div class="raw box">
                                            <div class="col-md-12" ng-repeat="jenis_belanja in ringkasan.data.jenis_belanja">
                                              <h1>{{jenis_belanja.text}}</h1>
                                              <p>{{jenis_belanja.jenis}}</p>
                                            </div>                                            
                                          </div>
                                          <br/><br/>
                                          <h4 class="text-success">BESARAN BERDASARKAN SUMBER DANA</h4>
                                          <div class="raw">
                                            <div class="col-md-12" ng-repeat="sumber_dana in ringkasan.data.sumber_dana">
                                              <h1>{{sumber_dana.text}}</h1>
                                              <p>{{sumber_dana.dana}}</p>
                                            </div>                                            
                                          </div>
                                                                                
                                        </div>
                                        <div class="col-md-6">
                                          <h3>Realisasi Anggaran. {{ringkasan.tahun}}</h3>
                                          <hr>
                                          <h4 class="text-danger">  BESARAN BERDASARKAN BIDANG</h4>
                                          <div class="raw">
                                            <div class="col-md-12" ng-repeat="belanja in ringkasan.data.r_bidang_belanja">
                                              <h1>{{belanja.text}}</h1>
                                              <p>{{belanja.bidang}}</p>
                                            </div>
                                          </div>
                                          <br/><br/>
                                          <h4 class="text-danger">   BESARAN BERDASARKAN JENIS BELANJA</h4>
                                          <div class="raw">
                                            <div class="col-md-12" ng-repeat="jenis_belanja in ringkasan.data.r_jenis_belanja">
                                              <h1>{{jenis_belanja.text}}</h1>
                                              <p>{{jenis_belanja.jenis}}</p>
                                            </div>
                                          </div>
                                          
                                        </div>
                                      </div>
                                  </div>
                                </div>
                          </div>            
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button type="button" class="btn btn-primary">Terverifikasi</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
          </div>
          <!-- end:ApiController -->

          <!-- begin:UploadController -->
          <div ng-controller="UploadController">
            <div ng-show="$parent.type == 'upload'">
              <?= $form->field($model, 'periode') ?>
              <?= $form->field($model, 'tahun') ?>
              
              <?= FileUploadUI::widget([
         
                'name' => 'file',
                'url' => ['upload-berkas/upload'], // your url, this is just for demo purposes,
                'options' => ['accept' => '*'],
                'clientOptions' => [
                    'maxFileSize' => 2000000
                ],
                // Also, you can specify jQuery-File-Upload events
                // see: https://github.com/blueimp/jQuery-File-Upload/wiki/Options#processing-callback-options
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
                ]);?>
            </div>
          </div>
          <!-- end:UploadController -->

        </div>
        <!-- end:MethodController -->

      </div>
    </div>

    
    
    

    <?php ActiveForm::end(); ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



<?php 
    //echo $this->registerJsFile('/js/angular.min.js');
    //echo $this->registerJsFile('@bower/angularjs/angular.min.js');
    //app\assets\AppAsset::publish('@bower/angularjs/angular.min.js');
    //echo Yii::getAlias('@bower');    
    
    //echo $this->registerJsFile('/js/wilayah.js'); 
    //echo $this->registerJsFile('/js/ringkasan.js'); 

    //Register JS files
    echo $this->registerJsFile('/js/pantau/create/app.js');
    echo $this->registerJsFile('/js/pantau/create/factory.js');
    echo $this->registerJsFile('/js/pantau/create/controllers/MainController.js');
    echo $this->registerJsFile('/js/pantau/create/controllers/WilayahController.js');
    echo $this->registerJsFile('/js/pantau/create/controllers/MethodController.js');
    echo $this->registerJsFile('/js/pantau/create/controllers/ApiController.js');
    echo $this->registerJsFile('/js/pantau/create/controllers/UploadController.js');
 ?>
