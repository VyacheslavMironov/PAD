<?php

namespace app\DTO;

class SettingsLogoDeleteDTO
{
    public int $organization_id;
    public string $file_name;

    public function __construct($organization_id, $file_name)
    {
        $this->organization_id = $organization_id;
        $this->file_name = $file_name;
    }
}