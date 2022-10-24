<?php

namespace app\Services;

class Base 
{
    public $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';

    public function generate_to_password()
    {
        return substr(str_shuffle($this->permitted_chars), 0, 10);
    }
}