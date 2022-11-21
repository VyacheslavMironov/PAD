<?php

namespace app\Services;

use ErrorException;
use app\DTO\UserUpdateDTO;
use app\Repository\UserUpdateRepository;

class UserUpdateService
{

    public function update($request)
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
    }
}