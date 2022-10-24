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


    public function registration_by()
    {
        Yii::$app->mailer->compose()
        ->setFrom('vuacheslavmironov@yandex.ru')
        ->setTo($this->context['email'])
        ->setSubject('Регистрация в PAD')
        ->setHtmlBody(
            "
            <h3>
            Здравствуйте, недавно вы зарегистрировались и создали рабочее окружение на
            платформе электронного журнала PAD
            </h3>
            <p>Ваши данные для входа:</p>
            <p>Логин:" . $this->context['email'] . "</p>
            <p>Пароль: " . $this->context['password'] . "</p>
            <br/>
            <p>Так же рекомендуем сразу активировать аккаунт перейдя по ссылке ниже:</p>
            <a href='http://127.0.0.1/signin?activate=true'>http://pad.ru/signin/activate</a>
            <br/>
            <br/>
            <p>Со всем уважением!<br/>Вячеслав</p>
            "
        )
        ->send();
    }

    public function reset_password_to_by()
    {
        Yii::$app->mailer->compose()
        ->setFrom('vuacheslavmironov@yandex.ru')
        ->setTo($this->context['email'])
        ->setSubject('Смена пароля в PAD')
        ->setHtmlBody(
            "
            <h3>
            Здравствуйте, недавно вы подавали заявку на смене пароля, ваш пароль успешно изменён.
            </h3>
            <p>Ваши данные для входа:</p>
            <p>Логин:" . $this->context['email'] . "</p>
            <p>Пароль: " . $this->context['password'] . "</p>
            <br/>
            <br/>
            <p>Со всем уважением!<br/>Вячеслав</p>
            "
        )
        ->send();
    }
}