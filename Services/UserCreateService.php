<?php

namespace app\Services;

use app\Services\Base;
use app\DTO\CreateUserDTO;
use app\Services\SendEmailService;
use app\Repository\UserCreateRepository;

class UserCreateService extends Base
{
    public function send($password, $email)
    {
        $mail = new SendEmailService(['password' => $password,'email' => $email]);
        return $mail->create_organization_by();
    }
    public function create($request) {
        $repository = new UserCreateRepository();
        $create = $repository->create(new CreateUserDTO(
            $request->post('organization_id'),
            null,
            null,
            $request->post('first_name'),
            $request->post('last_name'),
            null,
            $request->post('email'),
            $request->post('role'),
            false,
            null,
            null,
            $this->generate_to_password(),
        ));
        // Отправка письма
        $this->send($create->password, $request->post('email'));
        return $create;
    }
}