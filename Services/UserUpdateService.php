<?php

namespace app\Services;

use ErrorException;
use app\DTO\UserUpdateDTO;
use app\Repository\UserUpdateRepository;

class UserUpdateService
{

    public function update($request)
    {
        if ($request->post('first_name') && $request->post('last_name') && $request->post('role') && $request->post('email'))
        {
            $repository = new UserUpdateRepository();
            return $repository->update(
                new UserUpdateDTO(
                    $request->post('id'),
                    $request->post('first_name'),
                    $request->post('last_name'),
                    $request->post('role'),
                    $request->post('email')
                )
            );
        } else {
            throw new ErrorException('Укажите все параметры!\nОбязательные параметры - *id, *first_name, *last_name, *role, *email');
        }
    }
}