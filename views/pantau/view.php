<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pantau */

$this->title = $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Pantaus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pantau-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => (string)$model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => (string)$model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php print_r($model->content) ?>
    <?php /*DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'provinsi',
            'kode_provinsi',
            'kode_kabupaten',
            'kabupaten',
            'kode_kecamatan',
            'kecamatan',
            'kode_desa',
            'desa',
            'is_kelurahan',
            'periode',
            'tahun',
            'type',
            
        ],
    ])*/ ?>

</div>
