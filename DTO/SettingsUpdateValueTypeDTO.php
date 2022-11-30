<?php

namespace app\DTO;

class SettingsUpdateValueTypeDTO
{
    public int $organization_id;
    public string $value_type;

    public function __construct($organization_id, $value_type)
    {
        $this->organization_id = $organization_id;
        $this->value_type = $value_type;
    }
}