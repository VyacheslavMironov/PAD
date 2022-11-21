<?php

namespace app\Services;

use ErrorException;
use app\DTO\SettingsInfoDTO;
use app\Repository\SettingsInfoRepository;

class SettingsInfoService
{

    public function show($request) {
        $repository = new SettingsInfoRepository();
        return $repository->show(
            new SettingsInfoDTO(
                $request->get('id')
            )
        );
    }
}