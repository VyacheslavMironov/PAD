<?php

namespace app\Services;

use app\Repository\AuthUserRepository;

use app\DTO\AuthUserDTO;

class AuthUserService
{
    public function authByPassword($request){
        $repository = new AuthUserRepository();
        return $repository->createBearerToken($request);

    }

    // public function authByEmailCode($request){
    //         return new AuthUserRepository().createBearerToken($request);
    // }

    public function auth($request){
        if (isset($request->post('email'))) {
            if (isset($request->post('password')))
            {
                return $this->authByPassword($request);
            }
            // elseif (isset($request->post('email_code')))
            // {
                // return $this->authByEmailCode($request);
            // }
            else{
                return ['response' => false, 'message' => 'Пароль или E-mail код не указан!'];
            }
        }
    }
}