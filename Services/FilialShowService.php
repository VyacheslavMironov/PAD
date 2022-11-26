<?php

namespace app\Services;

use ErrorException;
use app\Repository\FilialShowRepository;
use app\DTO\FilialShowDTO;

class FilialShowService
{
    public function show_is_admin($context)
    {
        return;
    }

    public function show($request)
    {
        if ($request->get('admin_id'))
        {
            $repository = new FilialShowRepository();
            return $repository->show_is_admin(new FilialShowDTO(
                $request->get('organization_id'),
                $request->get('admin_id')
            ));
        } else {
            $repository = new FilialShowRepository();
            return $repository->show(new FilialShowDTO(
                $request->get('organization_id'),
                null
            ));
        }
    }
}