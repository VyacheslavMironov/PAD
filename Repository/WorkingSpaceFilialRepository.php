<?php

namespace app\Repository;


use app\models\SettingsFilial;
use app\models\Filial;

class WorkingSpaceFilialRepository
{

    public function createSettingsFilial(\app\DTO\SettingsFilialDTO $context)
    {
        $db = new SettingsFilial();
        $db->fio_format = $context->fio_format;
        $db->avatar = $context->avatar;
        $db->issaunce_pass = $context->issaunce_pass;
        $db->theme = $context->theme;
        $db->academic_month = $context->academic_month;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return $db;
        }
    }

    public function crateFilial(\app\DTO\FilialCreateDTO $context)
    {
        $db = new Filial();
        $db->admin_id = $context->admin_id;
        $db->organization_id = $context->organization_id;
        $db->name = $context->name;
        $db->settings_filial_id = $context->settings_filial_id;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return $db;
        }
    }
}