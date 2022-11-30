<?php

namespace app\DTO;

class ServiceConnectUpdateDTO
{
    public int $organization_id;
    public bool $is_video_platform;
    public bool $is_chat_platform;
    public bool $is_test_platform;
    public bool $is_game_platform;

    public function __construct($organization_id, $is_video_platform, $is_chat_platform, $is_test_platform, $is_game_platform)
    {
        $this->organization_id = $organization_id;
        $this->is_video_platform = $is_video_platform;
        $this->is_chat_platform = $is_chat_platform;
        $this->is_test_platform = $is_test_platform;
        $this->is_game_platform = $is_game_platform;
    }
}