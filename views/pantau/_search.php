<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchPantau */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pantau-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'provinsi') ?>

    <?= $form->field($model, 'kode_provinsi') ?>

    <?= $form->field($model, 'kode_kabupaten') ?>

    <?= $form->field($model, 'kabupaten') ?>

    <?php // echo $form->field($model, 'kode_kecamatan') ?>

    <?php // echo $form->field($model, 'kecamatan') ?>

    <?php // echo $form->field($model, 'kode_desa') ?>

    <?php // echo $form->field($model, 'desa') ?>

    <?php // echo $form->field($model, 'is_kelurahan') ?>

    <?php // echo $form->field($model, 'periode') ?>

    <?php // echo $form->field($model, 'tahun') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'content') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
