<?php

namespace app\Repository;

use app\models\Settings;

class ServiceConnectUpdateRepository
{
    public function update_is_video_platform($db, $context)
    {
        $db->is_video_platform = $context;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }

    public function update_is_chat_platform($db, $context)
    {
        $db->is_chat_platform = $context;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }

    public function update_is_test_platform($db, $context)
    {
        $db->is_test_platform = $context;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }

    public function update_is_game_platform($db, $context)
    {
        $db->is_game_platform = $context;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }

    public function update(\app\DTO\ServiceConnectUpdateDTO $context)
    {
        $db = Settings::findOne(['id' => $context->organization_id]);
        $this->update_is_video_platform($db, $context->is_video_platform);
        $this->update_is_chat_platform($db, $context->is_chat_platform);
        $this->update_is_test_platform($db, $context->is_test_platform);
        $this->update_is_game_platform($db, $context->is_game_platform);
        return $db;
    }
}