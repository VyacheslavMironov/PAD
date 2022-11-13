<?php

namespace app\DTO;

class LessonUpdateDTO
{
    public int|null $id;

    public string|null $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}