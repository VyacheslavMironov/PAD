<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%privileges_admin}}`.
 */
class m221014_023608_create_privileges_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%privileges_admin}}', [
            'id' => Schema::TYPE_PK,
            /*
              Указывает что администратор может заходить студентом,
              преподавателем, родителем.
            */
            'user_access' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            /*
              Указывает что администратор может рассылать E-mail 
              уведомления.
            */
            'user_email' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            /*
              Указывает что администратор может изменять или 
              выставлять оценки.
            */
            'is_envaluation' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            /*
              Указывает что администратор может добавлять 
              пользователей в систему.
            */
            'add_user' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            /*
              Указывает что администратор может загружать 
              файлы в хранилище организации.
            */
            'upload_file' => Schema::TYPE_BOOLEAN.' DEFAULT false',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%privileges_admin}}');
    }
}
