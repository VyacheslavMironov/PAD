<?php

namespace app\Services;

use app\Repository\WorkingSpaceOrganizationsRepository;

use ErrorException;
use DateTime;
use DateInterval;
use app\DTO\CreatePrivilegeAdminDTO;
use app\DTO\CreateSettingsDTO;
use app\DTO\CreateOrganizationDTO;
use app\DTO\CreateUserDTO;
use app\Services\Base;
use app\Services\SendEmailService;

class WorkingSpaceOrganizationsService extends Base
{
    public function addition_dates()
    {
        $date = new DateTime();
        $date->add(new DateInterval('P1M'));
        $date->add(new DateInterval('P14D'));
        return $date->format('Y-m-d');
    }

    public function send($password, $email)
    {
        $mail = new SendEmailService(['password' => $password,'email' => $email]);
        return $mail->create_organization_by();
    }

    public function validatePrivilegeAdminParam($param)
    {
        // Проверка полей на заполненость
        if ($param->post('user_access') == true || $param->post('user_access') == false)
        {
            if ($param->post('user_email') == true || $param->post('user_email') == false)
            {
                if ($param->post('is_envaluation') == true || $param->post('is_envaluation') == false)
                {
                    if ($param->post('add_user') == true || $param->post('add_user') == false)
                    {
                        if ($param->post('upload_file') == true || $param->post('upload_file') == false)
                        {
                            return new CreatePrivilegeAdminDTO(
                                $param->post('user_access') == 'true' ? true : false,
                                $param->post('user_email') == 'true' ? true : false,
                                $param->post('is_envaluation') == 'true' ? true : false,
                                $param->post('add_user') == 'true' ? true : false,
                                $param->post('upload_file') == 'true' ? true : false,
                            );
                        }
                    }
                }
            }
        }
        // Если прервётся какой то этап то по дефолту вернёт этот объект
        return new CreatePrivilegeAdminDTO(
            false, false, false, false,  false,
        );
    }

    public function validateSettingsParam($param)
    {
        return new CreateSettingsDTO(
            trim((string)$param->post('logo')) ? trim((string)$param->post('logo')) : 'default',
            date('Y/m/d h:i:s', time()), // payment_at
            $this->addition_dates(), // payment_to
            trim((string)$param->post('tariff_from')) ? trim((string)$param->post('tariff_from')) : 'Ежемесячный',
            true, // test_period
            null, // priveleges_admin_id
            $param->post('is_video_platform') == 'true' ? true : false,
            $param->post('is_chat_platform') == 'true' ? true : false,
            $param->post('is_test_platform') == 'true' ? true : false,
            $param->post('is_game_platform') == 'true' ? true : false,
            true, // is_backup
            true, // is_quiz_platform
            $param->post('is_evaluation_type') == 'true' ? true : false,
        );
    }

    public function validateOrganizationParam($param)
    {
        if (is_null($param->post('name')) || is_null($param->post('destination')))
        {
            throw new ErrorException('Название или назначение организации не указано!');
        } else {
            $workingSpace = new WorkingSpaceOrganizationsRepository();
            if ($workingSpace->double_organization($param->post('name')))
            {
                return new CreateOrganizationDTO(
                    trim($param->post('name')),
                    trim($param->post('destination')),
                    null, // settings_id
                );
            } else {
                throw new ErrorException('Такая организация уже существует в системе!');
            }
        }
    }

    public function validateUsernParam($param)
    {
        if (empty($param->post('first_name')) || empty($param->post('last_name')) || is_null($param->post('email')) || empty($param->post('role')))
        {
            throw new ErrorException('Не все параметры пользователя (владельца) указаны.\nОбязательные параметры => [*first_name, *last_name, *email, *role]');
        } else {
            $workingSpace = new WorkingSpaceOrganizationsRepository();
            if ($workingSpace->double_user($param->post('email')))
            {
                return new CreateUserDTO(
                    null, // organization_id
                    null, // filial_id
                    null, // middle_name
                    trim($param->post('first_name')),
                    trim($param->post('last_name')),
                    null, // middle_name
                    trim($param->post('email')),
                    trim($param->post('role')),
                    false, // is_active
                    null, // avatar
                    null, // email_code
                    trim($this->generate_to_password())
                );
            } else {
                throw new ErrorException('Пользователь с электронной почтой -> ' .$param->post('email').', уже зарегистрирован!');
            }
        }
    }

    public function createWorkingSpaceOrganizations($request)
    {
        $workingSpace = new WorkingSpaceOrganizationsRepository();
        $create = $workingSpace->create([
            // Привелегии администратора
            'privilege_admin' => $this->validatePrivilegeAdminParam($request),
            // Настройки рабочей области
            'settings' =>       $this->validateSettingsParam($request),
            // Параметры организации
            'organization' =>   $this->validateOrganizationParam($request),
            // Владелец
            'user' =>           $this->validateUsernParam($request),
        ]);
        // Отправка письма
        $this->send($request->post('password'), $request->post('email'));
        return $create;
    }
}