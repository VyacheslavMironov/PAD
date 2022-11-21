<?php

namespace app\Repository;


use app\models\Users;

class UserUpdateRepository
{

    public function update(\app\DTO\UserUpdateDTO $context)
    {
        $db = Users::findOne(['id' => $context->id]);
        $db->first_name = $context->first_name;
        $db->last_name = $context->last_name;
        $db->role = $context->role;
        $db->email = $context->email;
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