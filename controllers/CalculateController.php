<?php

namespace app\controllers;

use Yii;
use yii\bootstrap\ActiveForm;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use app\models\calculate\CalculatedForm;
use app\models\repositories\DataRepository;
use app\models\user\Request;
use app\models\releaseControl\FeatureEnums;
use app\components\releaseControl\ReleaseControlComponent;

/**
 * HomeController отвечает за работу калькулятором доставки
 */
class CalculateController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return[
            'verbs' => [
                'class' => \yii\filters\VerbFilter::class,
                'actions' => [
                    'feedback' => ['POST'],
                    'index' => ['GET','POST'],
                ],
            ],
            [
                'class' => \yii\filters\AjaxFilter::class,
                'only' => ['feedback'],
            ],
        ];
    }

    /**
     * Отображение домашней страницы и ajax валидация формы
     * 
     * @return mixed
     */
    public function actionIndex()
    {
        (string)$hello = "Hello world";

        return $this->render('index', [
            'hello' => $hello
        ]);
    }
    
}