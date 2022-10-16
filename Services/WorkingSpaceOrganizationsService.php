<?php

namespace app\Services;

use app\Repository\WorkingSpaceOrganizationsRepository;

use app\DTO\CreatePrivilegeAdminDTO;


class WorkingSpaceOrganizationsService
{
    public WorkingSpaceOrganizationsRepository $workingSpaceOrganizationsRepository;

    public function createWorkingSpaceOrganizations($request)
    {
        $workingSpace = new WorkingSpaceOrganizationsRepository();

        return $workingSpace->create(
            new CreatePrivilegeAdminDTO(
                (bool)$request->post('user_access'),
                (bool)$request->post('user_email'),
                (bool)$request->post('is_envaluation'),
                (bool)$request->post('add_user'),
                (bool)$request->post('upload_file')
            )
        );
    }
}