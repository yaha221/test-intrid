<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\shoe\Shoe */

$this->title = 'Create Shoe';
$this->params['breadcrumbs'][] = ['label' => 'Shoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shoe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
