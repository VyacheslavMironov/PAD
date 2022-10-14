<?php

namespace app\controllers;

class SettingsFilialController extends \yii\rest\ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
