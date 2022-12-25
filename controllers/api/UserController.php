<?php

namespace app\controllers\api;

use Yii;
use yii\filters\Cors;
use app\Services\UserInfoService;
use app\Services\ActivateUserService;
use app\Services\UserCreateService;
use app\Services\UserShowService;
use app\Services\UserShowOneService;
use app\Services\UserUpdateService;

class UserController extends \yii\rest\Controller {
    public $enableCsrfValidation = false;
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Allow-Origin' => ['*'],
                'Access-Control-Request-Methods' => ['POST', 'GET', 'PUT', 'DELETE', 'OPTIONS'],
                'Access-Control-Max-Age' => 3600,
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Headers' => ['X-Requested-With', 'Content-Type', 'Accept', 'Authorization'],
                #'Access-Control-Expose-Headers' => ['*'],
            ],
        ];
        return $behaviors;
    }

    public function actionInfo()
    {
        // Вызов сервиса
        $user_info = new UserInfoService();
        return $this->asJson(array(
            $user_info->info(Yii::$app->request)
        ));
    }

    public function actionActivate()
    {
        // Вызов сервиса
        $service = new ActivateUserService();
        return $this->asJson(array(
            $service->activate(Yii::$app->request)
        ));
    }

    public function actionCreate()
    {
        $service = new UserCreateService();
        return $this->asJson(array(
            $service->create(Yii::$app->request)
        ));
    }

    public function actionShow()
    {
        $service = new UserShowService();
        return $this->asJson(array(
            $service->show(Yii::$app->request)
        ));
    }

    public function actionUpdate()
    {
        $service = new UserUpdateService();
        return $this->asJson(array(
            $service->update(Yii::$app->request)
        ));
    }

    public function actionShowOne()
    {
        $service = new UserShowOneService();
        return $this->asJson(array(
            $service->show(Yii::$app->request)
        ));
    }
}