<?php

namespace app\Repository;

use app\models\Organization;
use app\models\Users;
use app\models\AccessKey;

class UserInfoRepository
{
    public array $user = array();

    public function show($context)
    {
        $identified = AccessKey::findOne(['token' => $context->token]);
        $is_user = Users::findOne(['id' => $identified->user_id]);
        array_push($this->user, $is_user);
        $is_organization = Organization::findOne(['id' => $is_user->organization_id]);
        array_push($this->user, $is_organization);
        return $this->user;
    }

}