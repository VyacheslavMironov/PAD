<?php

namespace app\DTO;

use Faker\Core\Number;
use Faker\Core\DateTime;

class DTOCreateOrganization
{

    public string $name;

    public string $destination;

    public string $settings_id;

    public function context()
    {
        return [
            $this->name,
            $this->destination,
            $this->settings_id,
        ];
    }
}