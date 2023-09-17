<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\JsExpression;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обувь';
?>
<div class="shoe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Показаны пользователи с {begin, number} по {end, number} из {totalCount, number}",
        'columns' => [
            'id',
            [
                'label' => 'Модель',
                'attribute' => 'id_model',
                'value' => function($model) {
                    return $model->model->model;
                },
                'filter' => Select2::widget([
                    'id' => 'models',
                    'model' => $searchModel,
                    'attribute' => 'id_model',
                    'data' => $repository->findShoeModel(),
                    'language' => 'ru',
                    'size' => 'sm',
                    'options' => [
                        'prompt' => 'Введите модель',
                    ],
                    'pluginOptions' => [
                        'minimumInputLength' => 3,
                        'allowClear' => true,
                        'ajax' => [
                            'url' => \yii\helpers\Url::to(['/shoe/modelsearch']),
                            'dataType' => 'json',
                            'data' =>  new JsExpression('function (params) { return {q:params.term}; }'),
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function (results) { return results.text; }'),
                        'templateSelection' => new JsExpression('function (models) { return models.text; }'),
                    ],
                ])
            ],
            [
                'label' => 'Размер',
                'attribute' => 'id_size',
                'value' => function($model) {
                    return $model->size->size;
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'data' => $repository->findShoeSize(),
                    'attribute' => 'id_size',
                    'size' => 'sm',
                    'options' => [
                        'placeholder' => 'Выберите размер',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ]
                ]),
            ],
            [
                'label' => 'Цвет',
                'attribute' => 'id_color',
                'value' => function($model) {
                    return $model->color->color;
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'name' => 'color',
                    'attribute' => 'id_color',
                    'data' => $repository->findShoeColor(),
                    'value' => 'color.id_color',
                    'language' => 'en',
                    'size' => 'sm',
                    'options' => [
                        'prompt' => 'Введите цвет',
                    ],
                    'pluginOptions' => [
                        'minimumInputLength' => 3,
                        'allowClear' => true,
                        'ajax' => [
                            'url' => \yii\helpers\Url::to(['/shoe/colorsearch']),
                            'dataType' => 'json',
                            'data' =>  new JsExpression('function (params) { return {q:params.term}; }'),
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function (model) { return model.text; }'),
                        'templateSelection' => new JsExpression('function (id_color) { return id_color.text; }'),
                    ],
                ])
            ],
            'price',
            'count',
            'vendor_code'
        ],
    ]); ?>

<?php Pjax::end(); ?>

</div>
