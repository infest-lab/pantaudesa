<?php

namespace app\controllers;

use Yii;
use app\models\Pantau;
use app\models\SearchPantau;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use linslin\yii2\curl;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * PantauController implements the CRUD actions for Pantau model.
 */
class PantauController extends Controller
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pantau models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchPantau();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pantau model.
     * @param integer $_id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pantau model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pantau();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => (string)$model->_id]);
            echo Json::encode([
                'status'=>'success',
                'message'=>'Data berhasil disimpan.',
                'redirect'=>Yii::$app->urlManager->createUrl('pantau/view/'.(string)$model->_id),
                ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionSimpan()
    {        
        /*if(Yii::$app->request->isPost){
          //  $model = new Pantau();
            //print_r(Yii::$app->request->bodyParams);
            $wilayah = Json::decode(Yii::$app->request->post('wilayah'));
            //$post = Yii::$app->request->bodyParams;

            print_r($wilayah);
        }*/
        $model = new Pantau();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            echo Json::encode([
                'status'=>'success',
                'message'=>'Data berhasil disimpan.',
                'redirect'=>Url::to('/pantau/view/'.(string)$model->_id)
                ]);
        } else {
            echo Json::encode([
                'status'=>'error',
                'message'=>'Data GAGAL disimpan.',
                'data'=>$model->getErrors()
            ]);
        }
    }

    /**
     * Updates an existing Pantau model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pantau model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $_id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionTinjau(){
        $curl = new curl\Curl();
        $response = $curl->get('http://lumbungku.local/index.php/api/keuangan/tahun');
        return $this->renderPartial('ringkasan',['tahun'=>json_decode($response)]);
    }

    public function actionGetRingkasan($tahun){
        $curl = new curl\Curl();
        $response = $curl->get('http://lumbungku.local/index.php/api/keuangan/ringkasan/tahun/2015');
        return $this->renderPartial('ringkasan_keuangan',['ringkasan'=> json_decode($response)], true, true);
    }

    /**
     * Finds the Pantau model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $_id
     * @return Pantau the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pantau::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
