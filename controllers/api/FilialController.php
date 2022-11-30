<?php

namespace app\controllers\api;

use Yii;
use yii\filters\Cors;
use app\Services\WorkingSpaceFilialService;
use app\Services\FilialShowService;
use app\Services\FilialDropService;

class FilialController extends \yii\rest\Controller{
    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // $behaviors['authenticator'] = [
        //     'class' => JwtHttpBearerAuth::class,
        // ];
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

    public function actionCreate()
    {
        $service = new WorkingSpaceFilialService();
        return $this->asJson(array(
            $service->createWorkingSpaceFilial(Yii::$app->request)
        ));
    }

    public function actionShow()
    {
        $service = new FilialShowService();
        return $this->asJson(array(
            $service->show(Yii::$app->request)
        ));
    }

    public function actionDelete()
    {
        $service = new FilialDropService();
        return $this->asJson(array(
            $service->drop(Yii::$app->request)
        ));
    }
}