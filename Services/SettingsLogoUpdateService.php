<?php

namespace app\Services;

use ErrorException;
use app\DTO\SettingsLogoUpdateDTO;
use app\Repository\SettingsLogoUpdateRepository;

class SettingsLogoUpdateService
{

    public function update($request) {
        $repository = new SettingsLogoUpdateRepository();
        return $repository->update(
            new SettingsLogoUpdateDTO(
                (int)$request->post('organization_id'),
                $request->post('file_name'),
            )
        );
    }
}