<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pantau */

$this->title = 'Update Pantau: ' . ' Desa ' . $model->desa;
$this->params['breadcrumbs'][] = ['label' => 'Pantaus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->desa, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pantau-update">
	<div class="heading-title">
		<h2><?= Html::encode($this->title) ?></h2>
	</div>
    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
