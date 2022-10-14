<?php

namespace app\controllers;

class LessonsController extends \yii\rest\ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
