<?php

namespace app\Repository;


use app\models\Settings;

class SettingsInfoRepository
{

    public function show(\app\DTO\SettingsInfoDTO $context)
    {
        $db = Settings::findOne(['id' => $context->organization_id]);
        return $db;
    }
}