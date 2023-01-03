<?php

namespace app\Services;

use ErrorException;
use app\DTO\UserShowOneDTO;
use app\Repository\UserShowOneRepository;

class UserShowOneService
{

    public function show($request)
    {
        if (is_null($request->get('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        }
        else if (is_null($request->get('user_id'))) 
        {
            throw new ErrorException('Укажите ID пользователя в системе!');   
        }
        else if (is_null($request->get('role'))) 
        {
            throw new ErrorException('Укажите роль пользователя в системе!');   
        } else {
            $repository = new UserShowOneRepository();
            return $repository->show(
                new UserShowOneDTO(
                    $request->get('organization_id'),
                    $request->get('user_id'),
                    $request->get('role')
                )
            );
        }
    }
}