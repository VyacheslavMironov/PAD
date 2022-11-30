<?php

namespace app\DTO;

class FilialDropDTO
{
    public int $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}