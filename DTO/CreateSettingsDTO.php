<?php

namespace app\DTO;

use DateTime;
use Faker\Core\Number;

class CreateSettingsDTO
{
    public string $logo;

    public string $payment_at;

    public string $payment_to;

    public string $tariff_from;

    public bool $test_period;

    public int|null $priveleges_admin_id;

    public bool $is_video_platform;

    public bool $is_chat_platform;

    public bool $is_test_platform;

    public bool $is_game_platform;

    public bool $is_backup;

    public bool $is_quiz_platform;

    public bool $is_evaluation_type;

    public function __construct($logo, $payment_at, $payment_to, $tariff_from, $test_period,
                    $priveleges_admin_id, $is_video_platform, $is_chat_platform, $is_test_platform,
                    $is_game_platform, $is_backup, $is_quiz_platform, $is_evaluation_type)
    {
        $this->logo = $logo;
        $this->payment_at = $payment_at;
        $this->payment_to = $payment_to;
        $this->tariff_from = $tariff_from;
        $this->test_period = $test_period;
        $this->priveleges_admin_id = $priveleges_admin_id;
        $this->is_video_platform = $is_video_platform;
        $this->is_chat_platform = $is_chat_platform;
        $this->is_test_platform = $is_test_platform;
        $this->is_game_platform = $is_game_platform;
        $this->is_backup = $is_backup;
        $this->is_quiz_platform = $is_quiz_platform;
        $this->is_evaluation_type = $is_evaluation_type;
    }
}