<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\repositories\DataRepository;


/**
 * ClientController отвечает за работу калькулятором доставки
 */
class ClientController extends Controller
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
                    'removealert' => ['POST'],
                ],
            ],
            [
                'class' => \yii\filters\AjaxFilter::class,
                'only' => ['removealert'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => yii\web\ErrorAction::class,
            ],
        ];
    }
   
    /**
     * Ajax-поиск по именам пользователей
     * 
     * @param string $q
     * @return array
     */
    public function actionUsersearch($q = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $username = ['results' => ['id' => '', 'text' => '']];
        $repository = new DataRepository();

        if(empty($q) === false) {
            $username['results'] = $repository->findUsersByUsername($q);
        }

        return $username;
    }
}