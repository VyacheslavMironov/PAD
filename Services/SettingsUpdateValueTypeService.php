<?php

namespace app\Services;

use app\DTO\SettingsUpdateValueTypeDTO;
use app\Repository\SettingsUpdateValueTypeRepository;

class SettingsUpdateValueTypeService
{

    public function update($request) {
        $repository = new SettingsUpdateValueTypeRepository();
        return $repository->update(
            new SettingsUpdateValueTypeDTO(
                (int)$request->post('organization_id'),
                $request->post('value_type'),
            )
        );
    }
}