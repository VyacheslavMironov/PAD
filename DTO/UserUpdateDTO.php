<?php

namespace app\DTO;

class UserUpdateDTO
{
    public int $id;
    public string $first_name;
    public string $last_name;
    public string $role;
    public string $email;

    public function __construct($id, $first_name, $last_name, $role, $email)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->role = $role;
        $this->email = $email;
    }
}