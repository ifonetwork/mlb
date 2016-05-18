<?php

namespace app\models;

use yii\base\Model;

class ParseForm extends Model {

    
     public $name;

    public function rules() {
        return [
            [ ['name'], 'required'],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'name',
        ];
    }

}
