<?php

namespace app\DTO;

class LessonAddUserIdDTO
{
    public int|null $id;

    public string|null $teacher_id;

    public function __construct($id, $teacher_id)
    {
        $this->id = $id;
        $this->teacher_id = $teacher_id;
    }
}