<?php

namespace app\controllers;

class OrganizationController extends \yii\rest\ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
