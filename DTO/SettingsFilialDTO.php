<?php

namespace app\DTO;

class SettingsFilialDTO
{
    public bool $fio_format;

    public bool $avatar;

    public bool $issaunce_pass;

    public string $theme;

    public string $academic_month;

    public function __construct($fio_format, $avatar, $issaunce_pass, $theme, $academic_month)
    {
        $this->fio_format = $fio_format;
        $this->avatar = $avatar;
        $this->issaunce_pass = $issaunce_pass;
        $this->theme = $theme;
        $this->academic_month = $academic_month;
    }
}