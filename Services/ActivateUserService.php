<?php

namespace app\Services;

use ErrorException;
use app\DTO\ActivationUserDTO;
use app\Repository\ActivationUserRepository;
use app\Services\SendEmailService;

class ActivateUserService
{
    public function activate($request) {
        if (is_null($request->post('email')))
        {
            $repository = new ActivationUserRepository();
            // Тут в принцепе ошибки быть не может
            $user = $repository->activate(
                new ActivationUserDTO(
                    $request->post('email')
                )
            );

            if ($user->is_active) {
                // Отправка запроса на сервис эл. писем
                $email = new SendEmailService(['email' => $request->post('email')]);
                $email->activation_by();
                return $user;
            }
        } else {
            throw new ErrorException('Не введён адрес электронной почты или введён не корректно!');
        }
    }
}