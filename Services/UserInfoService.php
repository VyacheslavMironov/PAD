<?php

namespace app\Services;
use app\DTO\UserInfoDTO;
use app\Repository\UserInfoRepository;

class UserInfoService
{

    public function info($request) {
        $repository = new UserInfoRepository();
        return $repository->show(
            new UserInfoDTO(
                $request->get('token')
            )
        );
    }
}