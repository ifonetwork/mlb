<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mlb".
 *
 * @property integer $GameID
 * @property string $DateTime
 * @property string $AwayTeam
 * @property string $HomeTeam
 * @property integer $StadiumID
 */
class Mlb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mlb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GameID', 'DateTime', 'AwayTeam', 'HomeTeam', 'StadiumID'], 'required'],
            [['GameID', 'StadiumID'], 'integer'],
            [['DateTime'], 'safe'],
            [['AwayTeam', 'HomeTeam'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GameID' => 'Game ID',
            'DateTime' => 'Date Time',
            'AwayTeam' => 'Away Team',
            'HomeTeam' => 'Home Team',
            'StadiumID' => 'Stadium ID',
        ];
    }
}
