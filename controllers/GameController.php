<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use  app\models\Mlb;
class GameController extends ActiveController
{
    public $modelClass = 'app\models\Mlb';

    
     public function actions(){
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex(){
        $activeData = new ActiveDataProvider([
            'query' => Mlb::find(),
             'pagination' => false,
            ]
        );
        return $activeData;
    }
    
 
    
}