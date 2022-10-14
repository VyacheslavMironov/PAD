<?php

namespace app\controllers;

class ScheduleController extends \yii\rest\ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
