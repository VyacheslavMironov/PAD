<?php

namespace app\DTO;

class CreatePrivilegeAdminDTO
{
    public bool $user_access;

    public bool $user_email;

    public bool $is_envaluation;

    public bool $add_user;

    public bool $upload_file;

    public function __construct($user_access, $user_email, $is_envaluation, $add_user, $upload_file)
    {
        $this->user_access = $user_access;
        $this->user_email = $user_email;
        $this->is_envaluation = $is_envaluation;
        $this->add_user = $add_user;
        $this->upload_file = $upload_file;
    }
}