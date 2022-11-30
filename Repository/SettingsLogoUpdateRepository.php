<?php

namespace app\Repository;


use app\models\Settings;

class SettingsLogoUpdateRepository
{

    public function update(\app\DTO\SettingsLogoUpdateDTO $context)
    {
        $db = Settings::findOne(['id' => $context->organization_id]);
        $db->logo = $context->fileName;
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