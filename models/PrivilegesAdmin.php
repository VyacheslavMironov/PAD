<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "privileges_admin".
 *
 * @property int $id
 * @property bool|null $user_access
 * @property bool|null $user_email
 * @property bool|null $is_envaluation
 * @property bool|null $add_user
 * @property bool|null $upload_file
 *
 * @property Settings $settings
 */
class PrivilegesAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'privileges_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_access', 'user_email', 'is_envaluation', 'add_user', 'upload_file'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_access' => 'User Access',
            'user_email' => 'User Email',
            'is_envaluation' => 'Is Envaluation',
            'add_user' => 'Add User',
            'upload_file' => 'Upload File',
        ];
    }

    /**
     * Gets query for [[Settings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasOne(Settings::class, ['priveleges_admin_id' => 'id']);
    }
}
