<?php

namespace app\Repository;

use app\models\Lessons;

class LessonDeleteRepository
{
    public function delete(\app\DTO\LessonDeleteDTO $context)
    {
        $db = Lessons::findOne(['id' => $context->id]);
        $db->delete();
        return true;
    }
}