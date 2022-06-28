<?php

namespace app\modules\library\controllers;

use app\modules\library\models\Rauthor;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthorController implements the CRUD actions for Rauthor model.
 */
class AuthorController extends Controller
{
    /**
     * Displays a single Rauthor model.
     * @param int $code Code
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionIndex($code)
    {
        return $this->render('index', [
            'model' => $this->findModel($code),
        ]);
    }

    /**
     * Finds the Rauthor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $authorcode ID
     * @return Rauthor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($authorcode)
    {
        if (($model = Rauthor::findOne(['authorcode' => $authorcode])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
