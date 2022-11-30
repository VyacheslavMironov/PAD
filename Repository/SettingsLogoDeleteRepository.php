<?php

namespace app\Repository;


use app\models\Settings;

class SettingsLogoDeleteRepository
{

    public function delete(\app\DTO\SettingsLogoDeleteDTO $context)
    {
        $db = Settings::findOne(['id' => $context->organization_id]);
        $db->logo = $context->file_name;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }
}