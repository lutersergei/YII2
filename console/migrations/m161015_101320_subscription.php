<?php

use yii\db\Migration;

class m161015_101320_subscription extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%subscription}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'subscription' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('subscription_user', '{{%subscription}}', 'user_id');
        $this->addForeignKey('FK_subscription_user', '{{%subscription}}', 'user_id', '{{%user}}', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('FK_subscription_user', '{{%subscription}}');
        $this->dropTable('{{%subscription}}');
    }
}
