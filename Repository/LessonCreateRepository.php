<?php

namespace app\Repository;

use app\models\Lessons;

class LessonCreateRepository
{
    public function create(\app\DTO\LessonCreateDTO $context)
    {
        $db = new Lessons();
        $db->organization_id = $context->organization_id;
        $db->filial_id = $context->filial_id;
        $db->teacher_id = $context->teacher_id;
        $db->name = $context->name;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return $db->errors;
        }
    }
}