<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\shoe\Shoe;
use app\models\shoe\Search;
use app\models\repositories\DataRepository;

/**
 * ShoeController implements the CRUD actions for Shoe model.
 */
class ShoeController extends Controller
{

    /**
     * Lists all Shoe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Search([]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $repo = new DataRepository;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'repository' => $repo,
        ]);
    }

    public function actionModelsearch($q = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $models = ['results' => ['id' => '', 'text' => '']];
        $repository = new DataRepository();

        if (empty($q) === false) {
            $models['results'] = $repository->findShoeByModel($q);
        }

        return $models;
    }

    public function actionColorsearch($q = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $colors = ['results' => ['id' => '', 'text' => '']];
        $repository = new DataRepository();

        if (empty($q) === false) {
            $colors['results'] = $repository->findShoeByColor($q);
        }

        return $colors;
    }
}
