<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mlb`.
 */
class m160518_190641_create_mlb extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('mlb', [
            'GameID' => $this->primaryKey(),
			'DateTime' =>  $this->datetime()->notNull(),
			'AwayTeam' =>  $this->string(50)->notNull(),
			'HomeTeam' =>  $this->string(50)->notNull(),
			'StadiumID' => $this->integer()->notNull()
			
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('mlb');
    }
}
