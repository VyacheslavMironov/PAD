<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%organization}}`.
 */
class m221014_044649_create_organization_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%organization}}', [
            'id' => Schema::TYPE_PK,

            // Наименование организации.
            'name' => Schema::TYPE_STRING.'(300) NOT NULL UNIQUE',

            // Конечное назначение пользования.
            'destination' => Schema::TYPE_CHAR."(100) CHECK(
              destination IN ('Колледж', 'Школа', 'Спортивная секция'))",

            // Ссылается на идентификатор таблицы настроек организации.
            'settings_id' => Schema::TYPE_BIGINT.' NOT NULL UNIQUE',
        ]);

        $this->createIndex(
            'idx-organization-settings_id',
            'organization',
            'settings_id'
        );

        $this->addForeignKey(
            'fk-organization-settings_id',
            'organization',
            'settings_id',
            'settings',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%organization}}');
    }
}
