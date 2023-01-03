<?php

namespace app\DTO;

class FilialCreateDTO
{
    public int $admin_id;

    public int $organization_id;

    public string $name;

    public int $settings_filial_id;

    public function __construct($admin_id, $organization_id, $name, $settings_filial_id)
    {
        $this->admin_id = $admin_id;
        $this->organization_id = $organization_id;
        $this->name = $name;
        $this->settings_filial_id = $settings_filial_id;
    }
}