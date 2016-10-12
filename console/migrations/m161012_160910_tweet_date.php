<?php

use yii\db\Migration;

class m161012_160910_tweet_date extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%tweets}}', 'create_at', $this->timestamp());
    }

    public function safeDown()
    {
        $this->dropColumn('{{%tweets}}', 'create_at');
    }
}
