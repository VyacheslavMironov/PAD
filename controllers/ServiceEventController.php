<?php

namespace app\controllers;

class ServiceEventController extends \yii\rest\ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
