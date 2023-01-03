<?php

namespace app\Repository;

use app\models\Settings;
use app\models\PrivilegesAdmin;

class PrivelegesAdminUpdateRepository
{
    public function update_user_access($db, $context)
    {
        $db->user_access = $context;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }

    public function update_user_email($db, $context)
    {
        $db->user_email = $context;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }

    public function update_is_envaluation($db, $context)
    {
        $db->is_envaluation = $context;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }

    public function update_add_user($db, $context)
    {
        $db->add_user = $context;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }

    public function update_upload_file($db, $context)
    {
        $db->upload_file = $context;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }

    public function update(\app\DTO\PrivelegesAdminUpdateDTO $context)
    {
        $settings_db = Settings::findOne(['id' => $context->organization_id]);
        $db = PrivilegesAdmin::findOne(['id' => $settings_db->priveleges_admin_id]);
        $this->update_user_access($db, $context->user_access);
        $this->update_user_email($db, $context->user_email);
        $this->update_is_envaluation($db, $context->is_envaluation);
        $this->update_add_user($db, $context->add_user);
        $this->update_upload_file($db, $context->upload_file);
        // Повторная выгрузка данных
        $db = PrivilegesAdmin::findOne(['id' => $settings_db->priveleges_admin_id]);
        return $db;
    }
}