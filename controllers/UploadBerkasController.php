<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;


class UploadBerkasController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new UploadForm();
        return $this->render('index' , ['model'=> $model]);
    }
    public function actionUpload(){

         $model = new UploadForm();
         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
         if ( Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstanceByName('file');
            if ($model->upload()) {
                echo json_encode(['test'=> 'hae']);
                return;
            }
            echo json_encode($model->getErrors());
            exit();
        }
    }

}
