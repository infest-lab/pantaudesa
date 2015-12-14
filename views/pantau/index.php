<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPantau */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pantaus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pantau-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pantau', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'_id',
            'provinsi',
            //'kode_provinsi',
            //'kode_kabupaten',
            'kabupaten',
            // 'kode_kecamatan',
             'kecamatan',
            // 'kode_desa',
             'desa',
            // 'is_kelurahan',
            // 'periode',
            // 'tahun',
            // 'type',
            // 'content',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
