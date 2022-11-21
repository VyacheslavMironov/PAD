<?php

namespace app\Services;

use ErrorException;
use app\DTO\PrivelegesAdminShowDTO;
use app\Repository\PrivelegesAdminShowRepository;

class PrivelegesAdminShowService
{

    public function show($request)
    {
        $repository = new PrivelegesAdminShowRepository();
        return $repository->show(
            new PrivelegesAdminShowDTO(
                (int)$request->get('organization_id')
            )
        );
    }
}