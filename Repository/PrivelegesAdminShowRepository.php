<?php

namespace app\Repository;

use app\models\Settings;
use app\models\PrivilegesAdmin;

class PrivelegesAdminShowRepository
{
    public function show(\app\DTO\PrivelegesAdminShowDTO $context)
    {
        $db = Settings::findOne(['id' => $context->organization_id]);
        $db = PrivilegesAdmin::findOne(['id' => $db->priveleges_admin_id]);
        return $db;
    }
}