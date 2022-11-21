<?php

namespace app\Services;

use ErrorException;
use app\DTO\ServiceConnectUpdateDTO;
use app\Repository\ServiceConnectUpdateRepository;

class ServiceConnectUpdateService
{
    public function update($request)
    {
        $repository = new ServiceConnectUpdateRepository();
        return $repository->update(
            new ServiceConnectUpdateDTO(
                (int)$request->post('organization_id'),
                (bool)$request->post('is_video_platform') == 'true' ? true : false,
                (bool)$request->post('is_chat_platform') == 'true' ? true : false,
                (bool)$request->post('is_test_platform') == 'true' ? true : false,
                (bool)$request->post('is_game_platform') == 'true' ? true : false,
            )
        );
    }
}