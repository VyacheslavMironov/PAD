<?php

namespace app\Services;

use ErrorException;
use app\Repository\ResetPasswordRepository;
use app\DTO\ResetPasswordDTO;
use app\DTO\ResetPasswordAuthDTO;
use app\Services\Base;
use app\Services\SendEmailService;

class ResetPasswordService extends Base
{
    public function send($password, $email)
    {
        $mail = new SendEmailService(['password' => $password, 'email' => $email]);
        return $mail->reset_to_password_by();
    }

    public function reset_password_to($request)
    {
        if (is_null($request->post('email')))
        {
            throw new ErrorException('Укажите адрес электронной почты!');
        } else {
            $repository = new ResetPasswordRepository();
            return $repository->to_password(new ResetPasswordDTO(
                $request->post('email'), 
                $this->generate_to_password()
            ));
        }
    }

    public function reset($request)
    {
        if (empty($request->post('token')))
        {
            if (is_null($request->post('old_password') || is_null($request->post('new_password'))))
            {
                throw new ErrorException('Проверьте что старый и новый пароли указаны!');
            } else {
                $user = $this->reset_password_to($request);
                if ($user)
                {
                    // Отправка письма
                    $this->send($user['password'], $request->post('email'));
                    return ['response' => true];
                } else {
                    return ['response' => false];
                }
            }
            
        } else {
            $repository = new ResetPasswordRepository();
            return $repository->update_password(
                new ResetPasswordAuthDTO(
                    $request->post('token'),
                    $request->post('old_password'),
                    $request->post('new_password'),
                )
            );
        }
    }
}