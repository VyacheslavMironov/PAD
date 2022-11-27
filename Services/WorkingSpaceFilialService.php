<?php

namespace app\Services;

use ErrorException;
use app\DTO\FilialCreateDTO;
use app\DTO\SettingsFilialDTO;
use app\Repository\WorkingSpaceFilialRepository;

class WorkingSpaceFilialService
{
    private function createWorkingSpaceSettingsFilial($context)
    {
        $repository = new WorkingSpaceFilialRepository();
        return $repository->createSettingsFilial(
            new SettingsFilialDTO(
                (bool)$context['fio_format'],
                (bool)$context['avatar'],
                (bool)$context['issaunce_pass'],
                (bool)$context['theme'],
                (bool)$context['academic_month']
            )
        );
    }

    public function createWorkingSpaceFilial($request)
    {

        $repository = new WorkingSpaceFilialRepository();
        $settings_filial_id = $this->createWorkingSpaceSettingsFilial([
            'fio_format' => $request->post('fio_format'),
            'avatar' => $request->post('avatar'),
            'issaunce_pass' => $request->post('issaunce_pass'),
            'theme' => $request->post('theme'),
            'academic_month' => $request->post('academic_month')
        ]);
        if (is_null($request->post('admin_id')))
        {
            throw new ErrorException('Укажите ID администратора!');
        } else {
            if (is_null($request->post('organization_id')))
            {
                throw new ErrorException('Укажите ID организации!');
            } else {
                if ($request->post('name'))
                {
                    throw new ErrorException('Укажите название филиала!');
                } else {
                    return $repository->crateFilial(
                        new FilialCreateDTO(
                            (int)$request->post('admin_id'),
                            (int)$request->post('organization_id'),
                            $request->post('name'),
                            $settings_filial_id->id
                        )
                    );
                }
            }
        }
    }
}