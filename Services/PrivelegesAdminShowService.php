<?php

namespace app\Services;

use ErrorException;
use app\DTO\PrivelegesAdminShowDTO;
use app\Repository\PrivelegesAdminShowRepository;

class PrivelegesAdminShowService
{

    public function show($request)
    {
        if (is_null($request->get('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        } else {
            $repository = new PrivelegesAdminShowRepository();
            return $repository->show(
                new PrivelegesAdminShowDTO(
                    (int)$request->get('organization_id')
                )
            );
        }
    }
}