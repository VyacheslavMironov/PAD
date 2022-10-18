<?php

use yii\db\Migration;
use yii\db\Schema;
use yii\db\Constraint;

/**
 * Handles the creation of table `{{%settings}}`.
 */
class m221014_030807_create_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%settings}}', [
            'id' => Schema::TYPE_PK,

            /*
              Путь к файлу изображения, если не установлен то применяется 
              дефолтный. Примерный путь => '/web/img/organization/logo/image.png'
            */ 
            'logo' => Schema::TYPE_TEXT.' NULL',

            // Когда был произведён последний платёж.
            'payment_at' => Schema::TYPE_DATE.' NULL',

            // Когда нужно будет платить за подписку.
            'payment_to' => Schema::TYPE_DATE.' NULL',

            // Тарифный план организации.
            'tariff_from' => Schema::TYPE_CHAR."(255) CHECK(
              tariff_from IN ('Тестовый', 'Ежемесячный', 'Полугодовой', 'Годовой'))",

            /*
              Действует ли на данный момент тестовый период (14 дней), для VIP 
              песон необходимо ставить поле settings.payment_to в 00.00.0000 00:00:00
            */
            'test_period' => Schema::TYPE_BOOLEAN.' DEFAULT true',

            // Строка ссылается на идентификатор таблицы привилегий  администратора.
            'priveleges_admin_id' => Schema::TYPE_BIGINT.' NOT NULL UNIQUE',

            // Применяется ли платформа уроков-онлайн организацией.
            'is_video_platform' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            // Применяется ли платформа чатов организацией.
            'is_chat_platform' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            // Применяется ли платформа тестирования студентов.
            'is_test_platform' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            // Применяется ли тематически игровая платформа.
            'is_game_platform' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            // Доступна ли выгрузка данных администраторам, преподавателям.
            'is_backup' => Schema::TYPE_BOOLEAN.' DEFAULT true',

            // Применяется ли платформа викторин.
            'is_quiz_platform' => Schema::TYPE_BOOLEAN.' DEFAULT true',

            // Тип оценочной единицы.
            'is_evaluation_type' => Schema::TYPE_BOOLEAN.' DEFAULT true',
        ]);

        $this->createIndex(
          'idx-settings-priveleges_admin_id',
          'settings',
          'priveleges_admin_id'
        );

        $this->addForeignKey(
          'fk-settings-priveleges_admin_id',
          'settings',
          'priveleges_admin_id',
          'privileges_admin',
          'id',
          'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%settings}}');
    }
}
