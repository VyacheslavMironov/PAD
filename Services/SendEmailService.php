<?php

namespace app\Services;
require_once '/var/www/PAD/config.php';
// use app\config\EMAIL_SERVICE_V1;

class SendEmailService
{
    public $context;

    public function __construct($context)
    {
        $this->context = $context;
    }


    public function create_organization_by()
    {
        $ch = curl_init(EMAIL_SERVICE_V1 . '/user/success_create_organization');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
                                                'email' => $this->context['email'],
                                                'data_login' => $this->context['email'],
                                                'data_password' => $this->context['password'],
                                                'data_link' => FRONTEND_URL . '/signin?activate=true'
                                            ]);
        curl_exec($ch);
        curl_close($ch);
    }

    public function registration_by()
    {
        $ch = curl_init(EMAIL_SERVICE_V1 . '/user/success_registration');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
                                                'email' => $this->context['email'],
                                                'data_login' => $this->context['email'],
                                                'data_password' => $this->context['password'],
                                                'data_link' => FRONTEND_URL . '/signin?activate=true'
                                            ]);
        curl_exec($ch);
        curl_close($ch);
    }

    public function activation_by()
    {
        $ch = curl_init(EMAIL_SERVICE_V1 . '/user/success_activation');
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
        $ch = curl_init(EMAIL_SERVICE_V1 . '/user/success_reset_to_password');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
                                                'email' => $this->context['email'],
                                                'data_password' => $this->context['password'],
                                            ]);
        curl_exec($ch);
        curl_close($ch);
    }
}