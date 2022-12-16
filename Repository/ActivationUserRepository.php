<?php

namespace app\Repository;

use app\models\Users;

class ActivationUserRepository
{
    public function activate($context)
    {
        $user = Users::findOne(['email' => $context->email]);
        $user->is_active = true;
        $user->save();
        return $user;
    }

}