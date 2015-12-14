<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPantau */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pantau';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pantau-index">
    <div class="heading-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Pantau Baru', ['create'], ['class' => 'btn btn-success']) ?>
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
