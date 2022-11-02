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

    public function if_password($email, $password)
    {
        $user = Users::findOne(['email' => $email]);
        if (trim($user->password) == $password){
            return true;
        } else {
            return false;
        }
    }

    public function auth($context)
    {
        $user = Users::findOne(['email' => $context->email]);
        // Ренерация Access Token
        $token = (string)$this->createBearerToken($user->id);
        $get_access_token = AccessKey::findOne(['user_id' => $user->id]);
            
        if ($get_access_token)
        {
            $db = AccessKey::findOne(['user_id' => $user->id]);
            $db->token = $token;
            $db->created_at = date('Y/m/d h:i:s', time());
            // Валидация параметров
            if ($db->validate())
            {
                $db->save();
            }
            return $db;
        } else {
            $db = new AccessKey();
            $db->user_id = $user->id;
            $db->token = $token;
            // Валидация параметров
            if ($db->validate())
            {
                $db->save();
            }
            return $db;
        }
    }
}