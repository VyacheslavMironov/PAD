<?php

namespace app\Repository;

use app\models\Lessons;

class LessonUpdateRepository
{
    public function update(\app\DTO\LessonUpdateDTO $context)
    {
        $db = Lessons::findOne(['id' => $context->id]);
        $db->name = $context->name;
        $db->save();
        return $db;
    }
}