<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pantau */

$this->title = 'Buat Pantau Baru';
$this->params['breadcrumbs'][] = ['label' => 'Pantaus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

app\assets\AngularAsset::register($this);
?>
<div class="pantau-create">
	<div class="heading-title">
    	<h2><?= Html::encode($this->title) ?></h2>
	</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
