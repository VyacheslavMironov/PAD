<?php

namespace app\DTO;

class UserInfoDTO
{
    public string $token;

    public function __construct($token)
    {
        $this->token = $token;
    }
}