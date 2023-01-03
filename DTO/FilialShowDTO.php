<?php

namespace app\DTO;

class FilialShowDTO
{
    public int $organization_id;
    public int|null $admin_id;

    public function __construct($organization_id, $admin_id)
    {
        $this->organization_id = $organization_id;
        $this->admin_id = $admin_id;
    }
}