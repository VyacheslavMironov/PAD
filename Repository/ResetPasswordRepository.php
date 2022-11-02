<?php

namespace app\Repository;

use ErrorException;
use app\models\Users;
use app\models\AccessKey;

class ResetPasswordRepository
{
    public function to_password($context)
    {
        $db = Users::findOne(['email' => $context->email]);
        $db->password = $context->new_password;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
        }
        return ['email' => $db->email, 'password' => $db->password];
    }

    public function if_password($key_id, $password)
    {
        $db = Users::findOne(['id' => $key_id->user_id]);
        if (trim($password) == trim($db->password))
        {
            return true;
        } else {
            return false;
        }
    }

    // Задел на будущее
    public function update_password($context)
    {
        $key_id = AccessKey::findOne(['token' => $context->token]);
        $db = Users::findOne(['id' => $key_id->user_id]);
        // Проверка пароля
        if ($this->if_password($key_id, $context->old_password))
        {
            $db->password = $context->new_password;
            // Валидация параметров
            if ($db->validate())
            {
                $db->save();
            }
            return $db;
        } else {
            throw new ErrorException('Старый пароль введён не верно!');
        }
    }

}