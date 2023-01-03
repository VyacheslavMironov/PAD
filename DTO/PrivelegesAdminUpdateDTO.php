<?php

namespace app\DTO;

class PrivelegesAdminUpdateDTO
{
    public int $organization_id;
    public bool $user_ccess;
    public bool $user_email;
    public bool $is_envaluation;
    public bool $add_user;
    public bool $upload_file;

    public function __construct($organization_id, $user_access, $user_email, $is_envaluation, $add_user, $upload_file)
    {
        $this->organization_id = $organization_id;
        $this->user_access = $user_access;
        $this->user_email = $user_email;
        $this->is_envaluation = $is_envaluation;
        $this->add_user = $add_user;
        $this->upload_file = $upload_file;
    }
}