<?php

namespace app\Repository;

use app\models\PrivilegesAdmin;
use app\models\Settings;
use app\models\Organization;
use app\models\UserRelation;
use app\models\Users;

class WorkingSpaceOrganizationsRepository
{
    public PrivilegesAdmin $privilegeAdminModel;
    public Settings $settingsModel;
    public Organization $organizationModel;
    public UserRelation $relationModel;
    public Users $userModel;

    public function createPrivilegeAdmin(\app\DTO\CreatePrivilegeAdminDTO $context)
    {
        $db = new PrivilegesAdmin();
        $db->user_access = $context->user_access;
        $db->user_email = $context->user_email;
        $db->is_envaluation = $context->is_envaluation;
        $db->add_user = $context->add_user;
        $db->upload_file = $context->upload_file;
        $db->save();
        return $db;


    }

    public function createSettings(array $context)
    {
        
    }

    public function createOrganization(array $context)
    {
        
    }

    public function createUserRelation(array $context)
    {
        
    }

    public function createUsers(array $context)
    {
        
    }

    public function create(\app\DTO\CreatePrivilegeAdminDTO $context)
    {
        $privilege_admin = $this->createPrivilegeAdmin($context);
        // Возврат единого собранного объекта
        return $privilege_admin;
    }
}
