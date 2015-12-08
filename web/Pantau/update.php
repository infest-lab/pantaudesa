<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pantau */

$this->title = 'Update Pantau: ' . ' ' . $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Pantaus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pantau-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
