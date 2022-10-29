<?php

namespace app\Services;
use app\DTO\ActivationUserDTO;
use app\Repository\ActivationUserRepository;
use app\Services\SendEmailService;

class ActivateUserService
{

    public function activate($request) {
        $repository = new ActivationUserRepository();
        $user = $repository->activate(
            new ActivationUserDTO(
                $request->post('email')
            )
        );

        if ($user->is_active) {
            $email = new SendEmailService(['email' => $request->post('email')]);
            $email->activation_by();
            return $user;
        }
    }
}