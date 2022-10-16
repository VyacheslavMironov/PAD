<?php

namespace app\DTO;

use DateTime;
use Faker\Core\Number;

class DTOCreateUser
{
    public Number $organization_id;

    public Number $filial_id;

    public Number $relation_id;

    public string $first_name;

    public string $last_name;

    public string $middle_name;

    public string $email;

    public string $role;

    public bool $is_active;

    public string $avatar;

    public string $email_code;

    public string $password;

    public DateTime $created_at;

    public Number $settings_id;
}