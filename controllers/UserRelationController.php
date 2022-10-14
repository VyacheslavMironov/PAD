<?php

namespace app\controllers;

class UserRelationController extends \yii\rest\ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
