<?php

namespace app\controllers;
use app\models\Kabupaten;
use app\models\Provinsi;
use app\models\Kecamatan;
use app\models\Desa;
use yii\helpers\Json;

class WilayahController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
     public function actionProvinsi(){
    	$model = Provinsi::find()->all();
    	echo Json::encode($model);
    }
    public function actionKabupaten($kode){
    	$model = Kabupaten::find()->where(['kode_provinsi'=> $kode])->all();
    	echo Json::encode($model);
    }
     public function actionKecamatan($kode){
    	$model = Kecamatan::find()->where(['kode_kabupaten'=> $kode])->all();
    	echo Json::encode($model);
    }
     public function actionDesa($kode){
    	$model = Desa::find()->where(['kode_kecamatan'=> $kode])->all();
    	echo Json::encode($model);
    }

}
