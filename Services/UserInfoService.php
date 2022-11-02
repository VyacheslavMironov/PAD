<?php

namespace app\Services;

use ErrorException;
use app\DTO\UserInfoDTO;
use app\Repository\UserInfoRepository;

class UserInfoService
{

    public function info($request) {
        if (is_null($request->get('token')))
        {
            throw new ErrorException('Персональный токен не указан!');
        } else {
            $repository = new UserInfoRepository();
            return $repository->show(
                new UserInfoDTO(
                    $request->get('token')
                )
            );
        }
    }
}