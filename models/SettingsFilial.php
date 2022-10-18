<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings_filial".
 *
 * @property int $id
 * @property bool|null $fio_format
 * @property bool|null $avatar
 * @property bool|null $issaunce_pass
 * @property string|null $theme
 * @property string|null $academic_month
 *
 * @property Filial $filial
 */
class SettingsFilial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings_filial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio_format', 'avatar', 'issaunce_pass'], 'boolean'],
            [['academic_month'], 'string'],
            [['theme'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio_format' => 'Fio Format',
            'avatar' => 'Avatar',
            'issaunce_pass' => 'Issaunce Pass',
            'theme' => 'Theme',
            'academic_month' => 'Academic Month',
        ];
    }

    /**
     * Gets query for [[Filial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilial()
    {
        return $this->hasOne(Filial::class, ['settings_filial_id' => 'id']);
    }
}
