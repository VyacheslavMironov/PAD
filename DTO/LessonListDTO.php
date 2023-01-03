<?php

namespace app\DTO;

class LessonListDTO
{
    public int|null $organization_id;

    public int|null $filial_id;

    public int|null $teacher_id;

    public function __construct($organization_id, $filial_id, $teacher_id)
    {
        $this->organization_id = $organization_id;
        $this->filial_id = $filial_id;
        $this->teacher_id = $teacher_id;
    }
}