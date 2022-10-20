<?php

namespace app\Services;

use app\Repository\AuthUserRepository;

use app\DTO\AuthUserDTO;

class AuthUserService 
{
    public function authByPassword($request){
        $repository = new AuthUserRepository();
        return $repository->auth(new AuthUserDTO($request->post('email'), $request->post('password')));

    }

    public function auth($request){
        return $this->authByPassword($request);
    }
}