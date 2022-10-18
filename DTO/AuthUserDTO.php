<?php

namespace app\DTO;

class AuthUserDTO
{
    public string $role;

    public string|null $email_code;

    public string $password;

    public function __construct($email, $email_code, $password)
    {
        $this->email = $email;
        $this->email_code = $email_code;
        $this->password = $password;
    }
}