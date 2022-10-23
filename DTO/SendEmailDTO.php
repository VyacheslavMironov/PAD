<?php

namespace app\DTO;

class SendEmailDTO
{
    public ?string $first_name;

    public string $email;

    public function __construct($first_name=null, $email)
    {
        $this->first_name = $first_name;
        $this->email = $email;
    }
}