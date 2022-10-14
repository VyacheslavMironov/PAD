<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lessons".
 *
 * @property int $id
 * @property int $organization_id
 * @property int $filial_id
 * @property int $teacher_id
 * @property string $name
 *
 * @property Filial $filial
 * @property Organization $organization
 * @property Schedule[] $schedules
 * @property Statements[] $statements
 * @property Users $teacher
 * @property TeacherFromLessons[] $teacherFromLessons
 */
class Lessons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lessons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'filial_id', 'teacher_id', 'name'], 'required'],
            [['organization_id', 'filial_id', 'teacher_id'], 'default', 'value' => null],
            [['organization_id', 'filial_id', 'teacher_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['filial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filial::class, 'targetAttribute' => ['filial_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::class, 'targetAttribute' => ['organization_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organization_id' => 'Organization ID',
            'filial_id' => 'Filial ID',
            'teacher_id' => 'Teacher ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Filial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilial()
    {
        return $this->hasOne(Filial::class, ['id' => 'filial_id']);
    }

    /**
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::class, ['id' => 'organization_id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['lesson_id' => 'id']);
    }

    /**
     * Gets query for [[Statements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatements()
    {
        return $this->hasMany(Statements::class, ['lesson_id' => 'id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Users::class, ['id' => 'teacher_id']);
    }

    /**
     * Gets query for [[TeacherFromLessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherFromLessons()
    {
        return $this->hasMany(TeacherFromLessons::class, ['lesson_id' => 'id']);
    }
}
