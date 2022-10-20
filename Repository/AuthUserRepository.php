<?php

namespace app\Repository;

use app\models\Users;
use app\models\AccessKey;
use ReallySimpleJWT\Tokens;

class AuthUserRepository
{
    public function createBearerToken($user_id)
    {
        $userKey = 'id';
        $secret = 'sec!ReT423*&';
        $expiration = time() + 50;
        $issuer = '127.0.0.1';

        $tokens = new Tokens();
        $token = $tokens->create(
            $userKey, 
            $user_id, 
            $secret, 
            $expiration, 
            $issuer
        );

        return $token->getToken();
    }

    public function auth($context)
    {
        $is_user = Users::find()->where(['email' => $context->email])->one();

        if (trim($is_user->password) == $context->password)
        {
            $token = (string)$this->createBearerToken($is_user->id);
            $get_access_token = AccessKey::find()->where(['user_id' => $is_user->id])->one();
            if ($get_access_token)
            {
                $update_access_token = AccessKey::findOne(['user_id' => $is_user->id]);
                $update_access_token->token = $token;
                $update_access_token->created_at = date('Y/m/d h:i:s', time());
                $update_access_token->save();
                return ['response' => true, 'message' => $update_access_token];
            } else {
                $set_access_token = new AccessKey();
                $set_access_token->user_id = $is_user->id;
                $set_access_token->token = $token;
                $set_access_token->save();
                return ['response' => true, 'message' => $set_access_token];
            }
        } else {
            return ['response' => false, 'message' => 'Логин или пароль указаны не верно!'];
        }
    }

}