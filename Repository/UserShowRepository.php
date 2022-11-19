<?php

namespace app\Repository;


use app\models\Users;

class UserShowRepository
{

    public function show(\app\DTO\UserShowDTO $context)
    {
        $db = Users::findAll(['role' => $context->role, 'organization_id' => $context->organization_id]);
        return $db;
    }
}