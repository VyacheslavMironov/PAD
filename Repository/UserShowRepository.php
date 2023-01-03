<?php

namespace app\Repository;


use app\models\Users;
use app\models\Lessons;

class UserShowRepository
{
    public $arr = array();
    public $diff = array();

    public function show(\app\DTO\UserShowDTO $context)
    {
        $db = Users::findAll(['role' => $context->role, 'organization_id' => $context->organization_id]);


        if ($context->is_lesson_id)
        {
            $lesson_db = Lessons::findOne(['id' => $context->is_lesson_id]);
            $users = explode(',', $lesson_db->teacher_id);
            // Обрезание пустой строки в конце, пиздец костыль
            foreach ($users as $value) { trim($value) == "" ? null : array_push($this->diff, $value); }
            foreach ($this->diff as $x)
            {
                foreach ($db as $y)
                {
                    (int)$y->id == (int)$x ? array_push($this->arr, $y) : null;
                }
            }
            return $this->arr;
        } else {
            return $db;
        }
        
    }
}