<?php

use yii\db\Migration;

class m161014_140356_user extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'firstname', $this->string()->notNull() . " AFTER username");
        $this->addColumn('{{%user}}', 'lastname', $this->string()->notNull() . " AFTER firstname");
    }

    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'firstname');
        $this->dropColumn('{{%user}}', 'lastname');
    }
}
