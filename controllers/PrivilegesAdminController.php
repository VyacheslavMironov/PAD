<?php

namespace app\controllers;

class PrivilegesAdminController extends \yii\rest\ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
