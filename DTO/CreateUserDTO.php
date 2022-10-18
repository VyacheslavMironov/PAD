<?php

namespace app\DTO;

class CreateUserDTO
{
    public int|null $organization_id;

    public int|null $filial_id;

    public int|null $relation_id;

    public string $first_name;

    public string $last_name;

    public string|null $middle_name;

    public string $email;

    public string $role;

    public bool|null $is_active;

    public string|null $avatar;

    public string|null $email_code;

    public string $password;

    public function __construct($organization_id, $filial_id, $relation_id, $first_name, $last_name,
                                $middle_name, $email, $role, $is_active, $avatar, $email_code,
                                $password)
    {
        $this->organization_id = $organization_id;
        $this->filial_id = $filial_id;
        $this->relation_id = $relation_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->middle_name = $middle_name;
        $this->email = $email;
        $this->role = $role;
        $this->is_active = $is_active;
        $this->avatar = $avatar;
        $this->email_code = $email_code;
        $this->password = $password;
    }
}