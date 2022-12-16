<?php

namespace app\DTO;

class ActivationUserDTO
{
    public string $email;

    public function __construct($email)
    {
        $this->email = $email;
    }
}