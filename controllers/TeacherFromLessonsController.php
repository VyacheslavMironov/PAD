<?php

namespace app\controllers;

class TeacherFromLessonsController extends \yii\rest\ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
