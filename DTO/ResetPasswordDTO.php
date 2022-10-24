<?php

namespace app\DTO;

class ResetPasswordDTO
{
    public string $email;
    public string $new_password;

    public function __construct($email, $new_password)
    {
        $this->email = $email;
        $this->new_password = $new_password;
    }
}