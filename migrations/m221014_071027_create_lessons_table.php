<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%lessons}}`.
 */
class m221014_071027_create_lessons_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lessons}}', [
            'id' => Schema::TYPE_PK,

            // Ссылается на идентификатор таблицы организации.
            'organization_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Ссылается на идентификатор таблицы филиала организации.
            'filial_id' => Schema::TYPE_BIGINT.' NULL',

            // Идентификатор преподавателя.
            'teacher_id' => Schema::TYPE_BIGINT.' NULL',

            // Наименование предмета.
            'name' => Schema::TYPE_STRING.'(255) NOT NULL',
        ]);

        $this->createIndex(
            'idx-lessons-organization_id',
            'lessons',
            'organization_id'
        );

        $this->addForeignKey(
            'fk-lessons-organization_id',
            'lessons',
            'organization_id',
            'organization',
            'id'
        );

        $this->createIndex(
            'idx-lessons-filial_id',
            'lessons',
            'filial_id'
        );

        $this->addForeignKey(
            'fk-lessons-filial_id',
            'lessons',
            'filial_id',
            'filial',
            'id'
        );

        $this->createIndex(
            'idx-lessons-teacher_id',
            'lessons',
            'teacher_id'
        );

        $this->addForeignKey(
            'fk-lessons-teacher_id',
            'lessons',
            'teacher_id',
            'users',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lessons}}');
    }
}
