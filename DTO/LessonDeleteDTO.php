<?php

namespace app\DTO;

class LessonDeleteDTO
{
    public int|null $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}