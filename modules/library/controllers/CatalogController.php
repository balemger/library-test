<?php

namespace app\modules\library\controllers;

use app\modules\library\models\Rbook;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatalogController implements the CRUD actions for Rbook model.
 */
class CatalogController extends Controller
{

    /**
     * Lists all Rbook models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Rbook::find()->with(['bookauthors']),

            'pagination' => [
                'pageSize' => 5
            ],
            'sort' => [
                'defaultOrder' => [
                    'bookid' => SORT_DESC,
                ]
            ],

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

}
