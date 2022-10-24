<?php

namespace app\Services;

use app\Repository\ResetPasswordRepository;
use app\DTO\ResetPasswordDTO;
use app\Services\Base;
use app\Services\SendEmailService;

class ResetPasswordService extends Base
{
    public function send($password, $email)
    {
        $mail = new SendEmailService(['password' => $password,'email' => $email]);
        return $mail->reset_password_to_by();
    }

    public function reset_password_to($request){
        $repository = new ResetPasswordRepository();
        return $repository->to_password(new ResetPasswordDTO(
            $request->post('email'), 
            $this->generate_to_password()
        ));

    }

    public function reset_password_from($request){}

    public function reset($request)
    {
        if ($request->post('old_password'))
        {
            return;
        } else {
            $user = $this->reset_password_to($request);
            if ($user)
            {
                // Отправка письма
                 $this->send($user['password'], $request->post('email'));
                 return ['response' => false, 'message' => true];
            } else {
                return ['response' => false, 'message' => false];
            }
        }
    }
}