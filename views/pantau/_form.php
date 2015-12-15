<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Provinsi;
use dosamigos\fileupload\FileUploadUI;
use app\assets\AngularAsset;
use app\assets\AngularFileUploadAsset;
/* @var $this yii\web\View */
/* @var $model app\models\Pantau */
/* @var $form yii\widgets\ActiveForm */

app\assets\AngularFileUploadAsset::register($this);

//echo Yii::$app->urlManager->createUrl(['/pantau/view','id'=>'566dedb0cee1ccf7378b456a']);
?>

<div class="pantau-form" ng-app="CreatePantu">

    <?php $form = ActiveForm::begin(); //['options'=> ['ng-submit'=> 'submit()']]?>
    <?php $config = Json::encode(['url'=>Url::base(true).Url::home(),'saveUrl'=>Url::to('/pantau/simpan')]);?>
    <!-- begin:MainController -->
    <div ng-controller="MainController" ng-init='init(<?=$config?>)'></div>
    <!-- end:MainController -->
    <div class="row">
      <div class="col-md-5">
        <div class="heading-title">
          <h3>Pilih Desa</h3>
        </div>
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
          
        </div>
        <!-- end:WilayahController -->
      </div>
      <div class="col-md-7">
        <!-- begin:MethodController -->
        <div ng-controller="MethodController">
          <div class="heading-title">
            <h3>Pilih Cara</h3>
          </div>
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
          <div ng-controller="UploadController" ng-init="init('<?=Url::to('/upload-berkas/upload')?>')">            
            <div ng-show="$parent.type == 'upload'" class="well">
              <?php //= $form->field($model, 'periode')->textInput(['ng-model'=>'formData.periode']) ?>
              <?php //= $form->field($model, 'tahun') ?>             
              <div class="heading-title">
                <h4><span class="glyphicon glyphicon-cloud-upload"></span> Unggah Berkas</h4>
              </div>
              <input type="file" nv-file-select uploader="uploader"/><br/>

              <div class="form-group" style="margin-bottom: 40px">
                <div class="heading-title">
                  <h4><span class="glyphicon glyphicon-stats"></span> Antrian Unggah</h4>
                </div>
                <p>Jumlah berkas: {{ uploader.queue.length }}</p>

                <table class="table">
                    <thead>
                        <tr>
                            <th width="50%">Nama Berkas</th>
                            <th ng-show="uploader.isHTML5">Ukuran</th>
                            <th ng-show="uploader.isHTML5">Proses</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="item in uploader.queue">
                            <td><strong>{{ item.file.name }}</strong></td>
                            <td ng-show="uploader.isHTML5" nowrap>{{ item.file.size/1024/1024|number:2 }} MB</td>
                            <td ng-show="uploader.isHTML5">
                                <div class="progress" style="margin-bottom: 0;">
                                    <div class="progress-bar" role="progressbar" ng-style="{ 'width': item.progress + '%' }"></div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span ng-show="item.isSuccess"><i class="glyphicon glyphicon-ok"></i></span>
                                <span ng-show="item.isCancel"><i class="glyphicon glyphicon-ban-circle"></i></span>
                                <span ng-show="item.isError"><i class="glyphicon glyphicon-remove"></i></span>
                            </td>
                            <td nowrap>
                                <button type="button" class="btn btn-success btn-xs" ng-click="item.upload()" ng-disabled="item.isReady || item.isUploading || item.isSuccess">
                                    <span class="glyphicon glyphicon-upload"></span> Unggah
                                </button>
                                <button type="button" class="btn btn-warning btn-xs" ng-click="item.cancel()" ng-disabled="!item.isUploading">
                                    <span class="glyphicon glyphicon-ban-circle"></span> Batal
                                </button>
                                <button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()">
                                    <span class="glyphicon glyphicon-trash"></span> Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div>
                  <div>
                      Proses antrian:
                      <div class="progress" style="">
                          <div class="progress-bar" role="progressbar" ng-style="{ 'width': uploader.progress + '%' }"></div>
                      </div>
                  </div>
                  <button type="button" class="btn btn-success btn-s" ng-click="uploader.uploadAll()" ng-disabled="!uploader.getNotUploadedItems().length">
                      <span class="glyphicon glyphicon-upload"></span> Unggah semua
                  </button>
                  <button type="button" class="btn btn-warning btn-s" ng-click="uploader.cancelAll()" ng-disabled="!uploader.isUploading">
                      <span class="glyphicon glyphicon-ban-circle"></span> Batalkan semua
                  </button>
                  <button type="button" class="btn btn-danger btn-s" ng-click="uploader.clearQueue()" ng-disabled="!uploader.queue.length">
                      <span class="glyphicon glyphicon-trash"></span> Hapus semua
                  </button>
                </div>
              </div>              
            </div>
          </div>
          <!-- end:UploadController -->

        </div>
        <!-- end:MethodController -->        
      </div>
    </div>
    <div class="form-group text-center" ng-controller="SaveController">
        <hr/><br/><br/>
        <button type="button" class="btn btn-lg btn-block btn-success" ng-click="simpanPantau()">Simpan</button>
        <?php //= Html::submitButton('Simpan', ['class' => $model->isNewRecord ? 'btn btn-lg btn-block btn-success' : 'btn btn-lg btn-block btn-primary']) ?>
    </div>
    
    

    

    <?php ActiveForm::end(); ?>
    
<?php    
    //Register JS files
    echo $this->registerJsFile('/js/pantau/create/app.js');
    echo $this->registerJsFile('/js/pantau/create/factory.js');
    echo $this->registerJsFile('/js/pantau/create/controllers/MainController.js');
    echo $this->registerJsFile('/js/pantau/create/controllers/WilayahController.js');
    echo $this->registerJsFile('/js/pantau/create/controllers/MethodController.js');
    echo $this->registerJsFile('/js/pantau/create/controllers/ApiController.js');
    echo $this->registerJsFile('/js/pantau/create/controllers/UploadController.js');
    echo $this->registerJsFile('/js/pantau/create/controllers/SaveController.js');
 ?>
