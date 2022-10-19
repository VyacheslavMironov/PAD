<?php

namespace app\Repository;

use app\models\PrivilegesAdmin;
use app\models\Settings;
use app\models\Organization;
use yii\base\ErrorException;
use app\models\Users;
use TypeError;

class WorkingSpaceOrganizationsRepository
{
    // Массив для ответа
    private array $response = array();

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

    public function createSettings(\app\DTO\CreateSettingsDTO $context)
    {
        $db = new Settings();
        $db->logo = $context->logo;
        $db->payment_at = $context->payment_at;
        $db->payment_to = $context->payment_to;
        $db->tariff_from = $context->tariff_from;
        $db->test_period = $context->test_period;
        $db->priveleges_admin_id = $context->priveleges_admin_id;
        $db->is_video_platform = $context->is_video_platform;
        $db->is_chat_platform = $context->is_chat_platform;
        $db->is_backup = $context->is_backup;
        $db->is_quiz_platform = $context->is_quiz_platform;
        $db->is_evaluation_type = $context->is_evaluation_type;
        $db->save();
        return $db;
    }

    public function createOrganization(\app\DTO\CreateOrganizationDTO $context)
    {
        $db = new Organization();
        $db->name = $context->name;
        $db->destination = $context->destination;
        $db->settings_id = $context->settings_id;
        $db->save();
        return $db;
    }

    public function createUsers(\app\DTO\CreateUserDTO $context)
    {
        $db = new Users();
        $db->organization_id = $context->organization_id;
        if (empty($context->filial_id)) /* Проверка на NULL */ $db->filial_id = $context->filial_id;
        if (empty($context->relation_id)) /* Проверка на NULL */ $db->relation_id = $context->relation_id;
        $db->first_name = $context->first_name;
        $db->last_name = $context->last_name;
        if (!empty($context->middle_name) ) /* Проверка на наличие */ $db->middle_name = $context->middle_name;
        $db->email = $context->email;
        $db->role = $context->role;
        if (isset($context->avatar)) /* Проверка на наличие */ $db->avatar = $context->avatar;
        $db->password = $context->password;
        $db->save();
        return $db;
    }

    public function create(array $context)
    {
        try {
            $organization = Organization::find()->where(['name' => $context['organization']->name])->one();
            $user = Users::find()->where(['email' => $context['user']->email])->one();

            if (isset($organization->name))
            {
                return ['response' => false, 'message' => 'Такая организация уже зарегистрированна!'];
            } else {
                if (isset($user->email) == $context['user']->email)
                {
                    return ['response' => false, 'message' => 'Пользователь с таким E-mail адресом уже существует!'];
                } else {
                    $privileges_admin = $this->createPrivilegeAdmin($context['privilege_admin']);
                    array_push($this->response, $privileges_admin);
                    // Добавление параметра Id привилегий администратора, так как имеется ссылка
                    $context['settings']->priveleges_admin_id = $privileges_admin->id;
                    $settings = $this->createSettings($context['settings']);
                    array_push($this->response, $settings);
                    // Добавление параметра Id настроек, так как имеется ссылка
                    $context['organization']->settings_id = $settings->id;
                    $organization = $this->createOrganization($context['organization']);
                    array_push($this->response, $organization);
                    // Добавление параметра Id организации, так как имеется ссылка
                    $context['user']->organization_id = $organization->id;
                    $user = $this->createUsers($context['user']);
                    array_push($this->response, $user);
                    return ['response' => true, 'message' => $this->response];
                }
            }
        } catch(ErrorException) {
            return ['response' => false, 'message' => 'Ошибка сервера!'];
        } catch(TypeError) {
            return ['response' => false, 'message' => 'Проверьте правильность написания полей!'];
        }
    }
}