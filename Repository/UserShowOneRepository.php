<?php

namespace app\Repository;


use app\models\Users;

class UserShowOneRepository
{

    public function show(\app\DTO\UserShowOneDTO $context)
    {
        $db = Users::findOne([
            'organization_id' => $context->organization_id, 
            'id' => $context->user_id, 
            'role' => $context->role
        ]);
        return $db;
    }
}