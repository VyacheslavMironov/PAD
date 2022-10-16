<?php

namespace app\DTO;

use DateTime;
use Faker\Core\Number;

class DTOCreateSettings
{
    public string $logo;

    public DateTime $payment_at;

    public DateTime $payment_to;

    public string $tariff_from;

    public bool $test_period;

    public Number $privileges_admin;

    public bool $is_video_platform;

    public bool $is_chat_platform;

    public bool $is_test_platform;

    public bool $is_game_platform;

    public bool $is_backup;

    public bool $is_quiz_platform;

    public bool $is_evaluation_type;
}