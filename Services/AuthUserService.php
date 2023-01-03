<?php

namespace app\Services;

use ErrorException;
use app\Repository\AuthUserRepository;
use app\DTO\AuthUserDTO;

class AuthUserService 
{
    public function auth($request){
        $repository = new AuthUserRepository();
        // А точно ли данные есть(?)
        if (is_null($request->post('email')) && is_null($request->post('password')))
        {
            throw new ErrorException('Введите логин и пароль!');
        } else {
            // Проверка на совпадение паролей
            if ($repository->if_password($request->post('email'), $request->post('password')))
            {
                return $repository->auth(new AuthUserDTO($request->post('email'), $request->post('password')));
            } else {
                throw new ErrorException('Логин или пароль введны не правильно!');
            }
        }
    }
}