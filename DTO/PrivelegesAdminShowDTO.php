<?php

namespace app\DTO;

class PrivelegesAdminShowDTO
{
    public int $organization_id;

    public function __construct($organization_id)
    {
        $this->organization_id = $organization_id;
    }
}