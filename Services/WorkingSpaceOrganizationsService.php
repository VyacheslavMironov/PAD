<?php

namespace app\Services;

use app\Repository\WorkingSpaceOrganizationsRepository;

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

    public function createWorkingSpaceOrganizations($request)
    {
        $workingSpace = new WorkingSpaceOrganizationsRepository();

        $create = $workingSpace->create([
            // Привелегии администратора
            'privilege_admin' => new CreatePrivilegeAdminDTO(
                                    (bool)$request->post('user_access'),
                                    (bool)$request->post('user_email'),
                                    (bool)$request->post('is_envaluation'),
                                    (bool)$request->post('add_user'),
                                    (bool)$request->post('upload_file'),
                                ),
            // Настройки рабочей области
            'settings' =>       new CreateSettingsDTO(
                                    (string)$request->post('logo'),
                                    date('Y/m/d h:i:s', time()), // payment_at
                                    $this->addition_dates(), // payment_to
                                    $request->post('tariff_from'),
                                    true, // test_period
                                    null, // priveleges_admin_id
                                    (bool)$request->post('is_video_platform'),
                                    (bool)$request->post('is_chat_platform'),
                                    (bool)$request->post('is_test_platform'),
                                    (bool)$request->post('is_game_platform'),
                                    true, // is_backup
                                    true, // is_quiz_platform
                                    (bool)$request->post('is_evaluation_type')
                                ),
            // Параметры организации
            'organization' =>   new CreateOrganizationDTO(
                                    $request->post('name'),
                                    $request->post('destination'),
                                    null, // settings_id
                                ),
            // Владелец
            'user' =>           new CreateUserDTO(
                                    null, // organization_id
                                    null, // filial_id
                                    null, // middle_name
                                    $request->post('first_name'),
                                    $request->post('last_name'),
                                    null, // middle_name
                                    $request->post('email'),
                                    $request->post('role'),
                                    null, // is_active
                                    null, // avatar
                                    null, // email_code
                                    // $request->post('password')
                                    $this->generate_to_password()
                                ),
        ]);
        // Отправка письма
        $this->send($request->post('password'), $request->post('email'));
        return $create;
    }
}