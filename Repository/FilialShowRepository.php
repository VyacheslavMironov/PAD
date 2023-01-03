<?php

namespace app\Repository;

use app\models\Filial;
use app\models\Users;

class FilialShowRepository
{
    public function show(\app\DTO\FilialShowDTO $context)
    {
        $arr = array();
        $filial_db = Filial::findAll(['organization_id' => $context->organization_id]);

        foreach ($filial_db as $item) {
            $user_db = Users::findOne(['id' => $item->admin_id]);
            array_push($arr, [
                'id' => $item->id,
                'admin_id' => $item->admin_id,
                'organization_id' => $item->organization_id,
                'name' => $item->name,
                'first_name' => $user_db->first_name,
                'last_name' => $user_db->last_name,
                'settings_filial_id' => $item->settings_filial_id
            ]);
        }
        return $arr;
    }

    public function show_is_admin(\app\DTO\FilialShowDTO $context)
    {
        $db = Filial::findAll([
            'organization_id' => $context->organization_id,
            'admin_id' => $context->admin_id
        ]);
        return $db;
    }
}