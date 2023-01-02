<?php

namespace app\DTO;

class UserShowOneDTO
{
    public int $organization_id;
    public string $user_id;
    public string $role;

    public function __construct($organization_id, $user_id, $role)
    {
        $this->organization_id = $organization_id;
        $this->user_id = $user_id;
        $this->role = $role;
    }
}