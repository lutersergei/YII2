<?php

use yii\db\Migration;

class m161007_093214_tweets extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tweets}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'text' => $this->text(),
            'image' => $this->string(255),
        ], $tableOptions);

        $this->createIndex('tweets_user', '{{%tweets}}', 'user_id');
        $this->addForeignKey('FK_tweets_user', '{{%tweets}}', 'user_id', '{{%user}}', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('FK_tweets_user', '{{%tweets}}');
        $this->dropTable('{{%tweets}}');
    }
}
