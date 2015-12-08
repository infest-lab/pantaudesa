<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pantau */

$this->title = 'Create Pantau';
$this->params['breadcrumbs'][] = ['label' => 'Pantaus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pantau-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
