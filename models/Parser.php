<?php

namespace app\models;

use Yii;   
use yii\base\Model;
use yii\httpclient\Client;
use app\models\Mlb;

class Parser extends Model {

    private $result_arr;
    private $request_url = 'https://api.fantasydata.net/mlb/v2/JSON/Games/2016';
    private $token = 'insert key';
    private $models = [];

    public function getJson() {
        //We must use   Task Queue ,  but this is  shared hosting
        $client = new Client();
        $response = $client->createRequest()
                ->setFormat(Client::FORMAT_JSON)
                ->setMethod('get')
                ->setUrl($this->request_url)
                ->setHeaders(['Ocp-Apim-Subscription-Key' => $this->token])
                ->send();
        if ($response->isOk) {
            $this->result_arr = $response->data;
            return true;
        }
        return false;
    }

    /**
     *  Update database 
     */
    public function updateDB() {
        
        $odd = function ($var) {
            return array_intersect_key($var, ['GameID' => 1, "DateTime" => 1, "AwayTeam" => 1, "HomeTeam" => 1, "StadiumID" => 1]);
        };
    //array filtering
        $final_array = array_map($odd, $this->result_arr);
    //Yii2 have no  ON DUPLICATE KEY UPDATE в batchInsert
        $sql = Yii::$app->db->queryBuilder->batchInsert('mlb', ['GameID', 'DateTime', 'AwayTeam', 'HomeTeam', 'StadiumID'], $final_array);
        Yii::$app->db->createCommand($sql . " ON DUPLICATE KEY UPDATE  GameID = VALUES(GameID)")->execute();
    }

}
