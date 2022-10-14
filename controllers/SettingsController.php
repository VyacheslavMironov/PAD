<?php

namespace app\controllers;

class SettingsController extends \yii\rest\ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
