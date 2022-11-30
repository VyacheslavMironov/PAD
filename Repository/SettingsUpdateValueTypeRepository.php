<?php

namespace app\Repository;


use app\models\Settings;

class SettingsUpdateValueTypeRepository
{

    public function update(\app\DTO\SettingsUpdateValueTypeDTO $context)
    {
        $db = Settings::findOne(['id' => $context->organization_id]);
        $db->is_evaluation_type = trim($context->value_type) == 'true' ? true : false;
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