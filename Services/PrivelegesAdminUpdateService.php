<?php

namespace app\Services;

use ErrorException;
use app\DTO\PrivelegesAdminUpdateDTO;
use app\Repository\PrivelegesAdminUpdateRepository;

class PrivelegesAdminUpdateService
{
    public function update($request)
    {
        $repository = new PrivelegesAdminUpdateRepository();
        return $repository->update(
            new PrivelegesAdminUpdateDTO(
                (int)$request->post('organization_id'),
                (bool)$request->post('user_access') == 'true' ? true : false,
                (bool)$request->post('user_email') == 'true' ? true : false,
                (bool)$request->post('is_envaluation') == 'true' ? true : false,
                (bool)$request->post('add_user') == 'true' ? true : false,
                (bool)$request->post('upload_file') == 'true' ? true : false,
            )
        );
    }
}