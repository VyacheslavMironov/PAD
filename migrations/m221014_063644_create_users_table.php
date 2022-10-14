<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m221014_063644_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => Schema::TYPE_PK,

            // Сылается на идентификатор таблицы организации.
            'organization_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Ссылается на идентификатор таблицы филиала организации.
            'filial_id' => Schema::TYPE_BIGINT.' NOT NULL',

            /*
              Не явно ссылается на идентификатор таблицы отношений 
              (Родитель к Студенту)
            */
            'relation_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Имя пользователя.
            'first_name' => Schema::TYPE_CHAR.'(255) NOT NULL',

            // Фамилия пользователя.
            'last_name' => Schema::TYPE_CHAR.'(255) NOT NULL',

            // Отчество.
            'middle_name' => Schema::TYPE_CHAR.'(255) NOT NULL',

            // Адрес электронной почты.
            'email' => Schema::TYPE_CHAR.'(255) NOT NULL UNIQUE',

            // Роль пользователя в системе
            'role' => Schema::TYPE_CHAR."(100) CHECK(
              role IN ('Директор', 'Администратор', 'Преподаватель', 'Тренер', 'Студент', 'Родитель')
            ) NOT NULL",

            // Перешёл ли пользователь по ссылки активации аккаунта.
            'is_active' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            // Изображение пользователя.
            'avatar' => Schema::TYPE_STRING.'(300)',

            // 12-тизначный код который высылается на почту.
            'email_code' => Schema::TYPE_CHAR.'(12)',

            // Пароль от аккаунта.
            'password' => Schema::TYPE_CHAR.'(25)',

            // Дата и время создания профиля.
            'created_at' => Schema::TYPE_DATETIME.' DEFAULT NOW()::timestamp',
        ]);

        $this->createIndex(
            'idx-users-organization_id',
            'users',
            'organization_id'
        );

        $this->addForeignKey(
            'fk-users-organization_id',
            'users',
            'organization_id',
            'organization',
            'id'
        );

        $this->createIndex(
            'idx-users-filial_id',
            'users',
            'filial_id'
        );

        $this->addForeignKey(
            'fk-users-filial_id',
            'users',
            'filial_id',
            'filial',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
