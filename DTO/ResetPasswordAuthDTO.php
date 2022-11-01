<?php

namespace app\DTO;

class ResetPasswordAuthDTO
{
    public string|null $token;
    public string|null $old_password;
    public string|null $new_password;

    public function __construct($token=null, $old_password=null, $new_password=null)
    {
        $this->token = $token;
        $this->old_password = $old_password;
        $this->new_password = $new_password;
    }
}