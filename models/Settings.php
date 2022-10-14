<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string|null $logo
 * @property string|null $payment_at
 * @property string|null $payment_to
 * @property string|null $tariff_from
 * @property bool|null $test_period
 * @property int $priveleges_admin_id
 * @property bool|null $is_video_platform
 * @property bool|null $is_chat_platform
 * @property bool|null $is_test_platform
 * @property bool|null $is_game_platform
 * @property bool|null $is_backup
 * @property bool|null $is_quiz_platform
 * @property bool|null $is_evaluation_type
 *
 * @property Organization $organization
 * @property PrivilegesAdmin $privelegesAdmin
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logo'], 'string'],
            [['payment_at', 'payment_to'], 'safe'],
            [['test_period', 'is_video_platform', 'is_chat_platform', 'is_test_platform', 'is_game_platform', 'is_backup', 'is_quiz_platform', 'is_evaluation_type'], 'boolean'],
            [['priveleges_admin_id'], 'required'],
            [['priveleges_admin_id'], 'default', 'value' => null],
            [['priveleges_admin_id'], 'integer'],
            [['tariff_from'], 'string', 'max' => 255],
            [['priveleges_admin_id'], 'unique'],
            [['priveleges_admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => PrivilegesAdmin::class, 'targetAttribute' => ['priveleges_admin_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logo' => 'Logo',
            'payment_at' => 'Payment At',
            'payment_to' => 'Payment To',
            'tariff_from' => 'Tariff From',
            'test_period' => 'Test Period',
            'priveleges_admin_id' => 'Priveleges Admin ID',
            'is_video_platform' => 'Is Video Platform',
            'is_chat_platform' => 'Is Chat Platform',
            'is_test_platform' => 'Is Test Platform',
            'is_game_platform' => 'Is Game Platform',
            'is_backup' => 'Is Backup',
            'is_quiz_platform' => 'Is Quiz Platform',
            'is_evaluation_type' => 'Is Evaluation Type',
        ];
    }

    /**
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::class, ['settings_id' => 'id']);
    }

    /**
     * Gets query for [[PrivelegesAdmin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrivelegesAdmin()
    {
        return $this->hasOne(PrivilegesAdmin::class, ['id' => 'priveleges_admin_id']);
    }
}
