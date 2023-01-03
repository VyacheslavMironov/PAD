<?php

namespace app\Repository;

use app\models\Lessons;

class LessonUpdateRepository
{
    public function update(\app\DTO\LessonUpdateDTO $context)
    {
        $db = Lessons::findOne(['id' => $context->id]);
        $db->name = $context->name;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }

    public function add_lesson_by_user(\app\DTO\LessonAddUserIdDTO $context)
    {
        $db = Lessons::findOne(['id' => $context->id]);
        $db->teacher_id = trim($db->teacher_id) . $context->teacher_id;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }
}