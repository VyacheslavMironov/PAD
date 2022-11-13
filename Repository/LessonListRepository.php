<?php

namespace app\Repository;

use app\models\Lessons;

class LessonListRepository
{
    public function lessonByOrganizationId(\app\DTO\LessonListDTO $context)
    {
        $db = Lessons::findAll(['organization_id' => $context->organization_id]);
        return $db;
    }

    public function lessonByFilialId(\app\DTO\LessonListDTO $context)
    {
        $db = Lessons::findAll(['filial_id' => $context->filial_id]);
        return $db;
    }

    public function lessonByTeacherId(\app\DTO\LessonListDTO $context)
    {
        $db = Lessons::findAll(['teacher_id' => $context->teacher_id]);
        return $db;
    }
}