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

    <table class="table ">
        <tr>
            <td>Provinsi</td>
            <td><?= Html::encode($model->provinsi); ?></td>
        </tr>
        <tr>
            <td>Kabupaten </td>
            <td><?= Html::encode($model->kabupaten); ?></td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td><?= Html::encode($model->kecamatan); ?></td>
        </tr>
        <tr>
            <td>Desa</td>
            <td><?= Html::encode($model->desa); ?></td>
        </tr>
    </table>

    <?php 
    if($model->method === 'url'):
        if(isset($modal->content['url'])): 
            echo $modal->content['url'];
        endif;

    else:

    endif;
     ?>
    <?php print_r($model->content); ?>
    <pre> <?php print_r($model); ?> </pre>
    <?php //print_r($model); ?>
     
  
     
     
    
    <?php /*DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'_id',
            'provinsi',
            //'kode_provinsi',
            //'kode_kabupaten',
            'kabupaten',
            //'kode_kecamatan',
            'kecamatan',
            //'kode_desa',
            'desa',
            //'is_kelurahan',
            //'periode',
            //'tahun',
            //'type',
            
        ],
    ]) */?>

</div>
