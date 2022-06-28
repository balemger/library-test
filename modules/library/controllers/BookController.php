<?php

namespace app\modules\library\controllers;

use app\modules\library\models\Rbook;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookController implements the CRUD actions for Rbook model.
 */
class BookController extends Controller
{
    /**
     * Displays a single Rbook model.
     * @param int $bookid ID
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
     * Finds the Rbook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $bookcode Code
     * @return Rbook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($bookcode)
    {
        if (($model = Rbook::findOne(['bookcode' => $bookcode])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
