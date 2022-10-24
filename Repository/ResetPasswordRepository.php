<?php

namespace app\Repository;

use app\models\Users;

class ResetPasswordRepository
{
    public function to_password($context)
    {
        $user = Users::findOne(['email' => $context->email]);
        $user->password = $context->new_password;
        $user->save();
        return ['email' => $user->email, 'password' => $user->password];
    }

    // Задел на будущее
    public function from_password($context)
    {
        return;
    }

}