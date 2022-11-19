<?php

namespace app\DTO;

class UserShowDTO
{
    public int $organization_id;
    public string $role;

    public function __construct($organization_id, $role)
    {
        $this->organization_id = $organization_id;
        $this->role = $role;
    }
}