<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обувь';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shoe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить обувь', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => "Показаны пользователи с {begin, number} по {end, number} из {totalCount, number}",
        'columns' => [
            'id',
            [
                'label' => 'Модель',
                'attribute' => 'id_model',
                'value' => function($model) {
                    return $model->model->model;
                },
            ],
            [
                'label' => 'Размер',
                'attribute' => 'id_size',
                'value' => function($model) {
                    return $model->size->size;
                },
            ],
            [
                'label' => 'Цвет',
                'attribute' => 'id_color',
                'value' => function($model) {
                    return $model->color->color;
                },
            ],
            'price',
            'count',
            'vendor_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php Pjax::end(); ?>

</div>
