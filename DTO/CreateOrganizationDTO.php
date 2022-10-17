<?php

namespace app\DTO;

class CreateOrganizationDTO
{

    public string $name;

    public string $destination;

    public int|null $settings_id;

    public function __construct($name, $destination, $settings_id)
    {
        $this->name = $name;
        $this->destination = $destination;
        $this->settings_id = $settings_id;
    }
}