<?php

namespace app\DTO;

class UserShowDTO
{
    public int $organization_id;
    public string $role;
    public int|null $is_lesson_id;

    public function __construct($organization_id, $role, $is_lesson_id)
    {
        $this->organization_id = $organization_id;
        $this->role = $role;
        $this->is_lesson_id = $is_lesson_id;
    }
}