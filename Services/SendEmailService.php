<?php

namespace app\Services;
use Yii;
use app\DTO\SendEmailDTO;

class SendEmailService
{
    public $context;

    public function __construct($context)
    {
        $this->context = $context;
    }


    public function create_organization_by()
    {
        $ch = curl_init('http://127.0.0.1:8081/v1/user/success_create_organization');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
                                                'email' => $this->context['email'],
                                                'data_login' => $this->context['email'],
                                                'data_password' => $this->context['password'],
                                                'data_link' => 'http:127.0.0.1/signin?activate=true'
                                            ]);
        curl_exec($ch);
        curl_close($ch);
    }

    public function registration_by()
    {
        $ch = curl_init('http://127.0.0.1:8081/v1/user/success_registration');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
                                                'email' => $this->context['email'],
                                                'data_login' => $this->context['email'],
                                                'data_password' => $this->context['password'],
                                                'data_link' => 'http:127.0.0.1/signin?activate=true'
                                            ]);
        curl_exec($ch);
        curl_close($ch);
    }

    public function activation_by()
    {
        $ch = curl_init('http://127.0.0.1:8082/v1/user/success_activation');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
                                                'email' => $this->context['email'],
                                            ]);
        curl_exec($ch);
        curl_close($ch);
    }

    public function reset_to_password_by()
    {
        $ch = curl_init('http://127.0.0.1:8082/v1/user/success_reset_to_password');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
                                                'email' => $this->context['email'],
                                                'data_password' => $this->context['password'],
                                            ]);
        curl_exec($ch);
        curl_close($ch);
    }

    // public function reset_password_to_by()
    // {
    //     Yii::$app->mailer->compose()
    //     ->setFrom('vuacheslavmironov@yandex.ru')
    //     ->setTo($this->context['email'])
    //     ->setSubject('Смена пароля в PAD')
    //     ->setHtmlBody(
    //         "
    //         <h3>
    //         Здравствуйте, недавно вы подавали заявку на смене пароля, ваш пароль успешно изменён.
    //         </h3>
    //         <p>Ваши данные для входа:</p>
    //         <p>Логин:" . $this->context['email'] . "</p>
    //         <p>Пароль: " . $this->context['password'] . "</p>
    //         <br/>
    //         <br/>
    //         <p>Со всем уважением!<br/>Вячеслав</p>
    //         "
    //     )
    //     ->send();
    // }
}