<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%settings_filial}}`.
 */
class m221014_060132_create_settings_filial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%settings_filial}}', [
            'id' => Schema::TYPE_PK,

            // Позволяет использовать формат <Имя> <Фамилия> <Отчество>
            'fio_format' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            // Включает возможность пользователям добавлять аватары.
            'avatar' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            // Включает возможность логиниться по коду, который приходит на E-mail.
            'issaunce_pass' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            // Устанавливает тему отображения контента (шрифты, цвета и т.д)
            'theme' => Schema::TYPE_CHAR."(100) DEFAULT 'Default'",

            // Хранит строку с рабочими месецами.
            'academic_month' => Schema::TYPE_TEXT." DEFAULT 'Сентябрь,Октябрь,Ноябрь,Декабрь,Январь,Февраль,Март,Апрель,Май'",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%settings_filial}}');
    }
}
