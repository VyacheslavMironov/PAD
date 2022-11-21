<?php

namespace app\Services;

use ErrorException;
use app\DTO\UserShowDTO;
use app\Repository\UserShowRepository;

class UserShowService
{

    public function show($request)
    {

        $repository = new UserShowRepository();
        return $repository->show(
            new UserShowDTO(
                $request->get('organization_id'),
                $request->get('role')
            )
            );
    }
}