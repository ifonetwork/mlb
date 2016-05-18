<?php

namespace app\controllers;

use Yii;
use app\models\Mlb;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Parser;
use app\models\ParseForm;

/**
 * MlbController implements the CRUD actions for Mlb model.
 */
class MlbController extends Controller {

    /**
     * @inheritdoc
     */


     public $defaultAction = 'table';
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Show form  for begin updating information,  validate and parse if model load
     * @return mixed
     */
    public function actionSync() {
        $model = new ParseForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model = new ParseForm(); //clear form

            $parser = new Parser();
            if ($parser->getJson()) {
                $parser->updateDB();
                Yii::$app->session->setFlash("success", "Information was sucsesfully updated");
            } else {
                Yii::$app->session->setFlash("error", "Error retrieving json");
            }


        }
        return $this->render('sync', ['model' => $model]);
    }

    /**
     * Show html table with ajax data
     * @return mixed
     */

    public function actionTable() {
        return $this->render('table');
    }

    /**
     * Finds the Mlb model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mlb the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Mlb::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
