<?php

namespace app\DTO;

class SettingsLogoUpdateDTO
{
    public int $organization_id;
    public string $fileName;

    public function __construct($organization_id, $fileName)
    {
        $this->organization_id = $organization_id;
        $this->fileName = $fileName;
    }
}