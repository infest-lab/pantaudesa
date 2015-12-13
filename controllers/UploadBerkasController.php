<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;


class UploadBerkasController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $model = new UploadForm();
        return $this->render('index' , ['model'=> $model]);
    }
    public function actionUploader(){

        $model = new UploadForm();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ( Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstanceByName('file');
            if ($model->upload()) {
                echo json_encode(['test'=> 'hae']);
                //return;
                exit();
            }
            echo json_encode($model->getErrors());
            exit();
        }else{
           echo json_encode(['error','message'=>'Error 400']);
        }
    }
    public function actionUpload(){

        $model = new UploadForm();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstanceByName('file');
            $model->file->name = time().'_'.$model->file->name;
            if ($model->upload()) {
                // file is uploaded successfully
                echo json_encode(['status'=>'success','message'=>'Berkas berhasil diunggah','data'=>$model->file]);
                return;
            }else{
                echo json_encode($model->getErrors());
                return;
            }
        }else{
            echo json_encode(['error','message'=>'Error 400']);
        }
    }
}
