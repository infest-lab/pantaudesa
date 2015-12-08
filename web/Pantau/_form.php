<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pantau */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pantau-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'provinsi') ?>

    <?= $form->field($model, 'kode_provinsi') ?>

    <?= $form->field($model, 'kode_kabupaten') ?>

    <?= $form->field($model, 'kabupaten') ?>

    <?= $form->field($model, 'kode_kecamatan') ?>

    <?= $form->field($model, 'kecamatan') ?>

    <?= $form->field($model, 'kode_desa') ?>

    <?= $form->field($model, 'desa') ?>

    <?= $form->field($model, 'is_kelurahan') ?>

    <?= $form->field($model, 'periode') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'content') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
