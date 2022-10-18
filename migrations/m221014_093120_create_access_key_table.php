<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%access_key}}`.
 */
class m221014_093120_create_access_key_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%access_key}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_BIGINT,
            'token' => Schema::TYPE_TEXT.' NOT NULL UNIQUE',
            'created_at' => Schema::TYPE_TIMESTAMP.' DEFAULT NOW()::timestamp',
        ]);

        $this->createIndex(
            'idx-access_key-user_id',
            'access_key',
            'user_id'
        );

        $this->addForeignKey(
            'fk-access_key-user_id',
            'access_key',
            'user_id',
            'users',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%access_key}}');
    }
}
