<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%filial}}`.
 */
class m221014_061618_create_filial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%filial}}', [
            'id' => Schema::TYPE_PK,

            // Идентификатор администратора.
            'admin_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Идентификатор организации.
            'organization_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Наименование филиала.
            'name' => Schema::TYPE_STRING.'(300) NOT NULL',

            // Ссылается на таблицу настроек филиала.
            'settings_filial_id' => Schema::TYPE_BIGINT.' NOT NULL UNIQUE',
        ]);

        $this->createIndex(
            'idx-filial-settings_filial_id',
            'filial',
            'settings_filial_id'
        );

        $this->addForeignKey(
            'fk-filial-settings_filial_id',
            'filial',
            'settings_filial_id',
            'settings_filial',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%filial}}');
    }
}
