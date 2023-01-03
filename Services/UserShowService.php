<?php

namespace app\Services;

use ErrorException;
use app\DTO\UserShowDTO;
use app\Repository\UserShowRepository;

class UserShowService
{

    public function show($request)
    {
        if (is_null($request->get('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        }
        else if (is_null($request->get('role'))) 
        {
            throw new ErrorException('Укажите роль пользователя в системе!');   
        } else {
            $repository = new UserShowRepository();
            return $repository->show(
                new UserShowDTO(
                    $request->get('organization_id'),
                    $request->get('role'),
                    is_null($request->get('is_lesson_id')) ? null : $request->get('is_lesson_id')
                )
            );
        }
    }
}