<?php

namespace app\Services;

use app\Repository\WorkingSpaceOrganizationsRepository;

use app\DTO\CreatePrivilegeAdminDTO;
use app\DTO\CreateSettingsDTO;
use app\DTO\CreateOrganizationDTO;
use app\DTO\CreateUserDTO;

class WorkingSpaceOrganizationsService
{
    // public WorkingSpaceOrganizationsRepository $workingSpaceOrganizationsRepository;

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
                                    $request->post('payment_at'),
                                    $request->post('payment_to'),
                                    (string)$request->post('tariff_from'),
                                    (bool)$request->post('test_period'),
                                    null,
                                    (bool)$request->post('is_video_platform'),
                                    (bool)$request->post('is_chat_platform'),
                                    (bool)$request->post('is_test_platform'),
                                    (bool)$request->post('is_game_platform'),
                                    (bool)$request->post('is_backup'),
                                    (bool)$request->post('is_quiz_platform'),
                                    (bool)$request->post('is_evaluation_type')
                                ),
            // 
            'organization' =>   new CreateOrganizationDTO(
                                    $request->post('name'),
                                    $request->post('destination'),
                                    null, // settings_id
                                ),
            'user' =>           new CreateUserDTO(
                                    null, // organization_id
                                    null, // filial_id
                                    null, // middle_name
                                    $request->post('first_name'),
                                    $request->post('last_name'),
                                    $request->post('middle_name'),
                                    $request->post('email'),
                                    $request->post('role'),
                                    null, // is_active
                                    $request->post('avatar'),
                                    null, // email_code
                                    $request->post('password')
                                ),
        ]);

        return $create;
    }
}