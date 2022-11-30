<?php

namespace app\Services;

use ErrorException;
use app\DTO\SettingsUpdateValueTypeDTO;
use app\Repository\SettingsUpdateValueTypeRepository;

class SettingsUpdateValueTypeService
{

    public function update($request) {
        if (is_null($request->post('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        } else {
            if (is_null($request->post('value_type')))
            {
                throw new ErrorException('Укажите тип оценочной единицы!');
            } else {
                $repository = new SettingsUpdateValueTypeRepository();
                return $repository->update(
                    new SettingsUpdateValueTypeDTO(
                        (int)$request->post('organization_id'),
                        $request->post('value_type'),
                    )
                );
            }
        }
    }
}