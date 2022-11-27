<?php

namespace app\Services;

use ErrorException;
use app\DTO\SettingsLogoUpdateDTO;
use app\Repository\SettingsLogoUpdateRepository;

class SettingsLogoUpdateService
{

    public function update($request) {
        if (is_null($request->post('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        } else {
            if (is_null($request->post('file_name')))
            {
                throw new ErrorException('Укажите имя файла!');
            } else {
                $repository = new SettingsLogoUpdateRepository();
                return $repository->update(
                    new SettingsLogoUpdateDTO(
                        (int)$request->post('organization_id'),
                        $request->post('file_name'),
                    )
                );
            }
        }
    }
}