<?php

namespace app\Repository;

use app\models\Users;

class UserCreateRepository
{
    public function create(\app\DTO\CreateUserDTO $context)
    {
        $db = new Users();
        $db->organization_id = $context->organization_id;
        $db->filial_id = $context->filial_id;
        $db->relation_id = $context->relation_id;
        $db->first_name = $context->first_name;
        $db->last_name = $context->last_name;
        $db->middle_name = $context->middle_name;
        $db->email = $context->email;
        $db->role = $context->role;
        $db->is_active = $context->is_active;
        $db->avatar = $context->avatar;
        $db->email_code = $context->email_code;
        $db->password = $context->password;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        }
    }

}