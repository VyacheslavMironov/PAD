<?php

namespace app\controllers;

class AccessKeyController extends \yii\rest\ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
