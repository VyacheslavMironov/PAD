<?php

namespace app\controllers\api;

use Yii;
use yii\filters\Cors;
use app\Services\LessonCreateService;
use app\Services\LessonListService;
use app\Services\LessonUpdateService;
use app\Services\LessonDeleteService;

class LessonController extends \yii\rest\Controller {
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

    public function actionCreate()
    {
        $service = new LessonCreateService();
        return $this->asJson(array(
            $service->create(Yii::$app->request)
        ));
    }

    public function actionDelete()
    {
        $service = new LessonDeleteService();
        return $service->delete(Yii::$app->request);
    }

    public function actionList()
    {
        $service = new LessonListService();
        return $service->list(Yii::$app->request);
    }

    public function actionUpdate()
    {
        $service = new LessonUpdateService();
        return $service->update(Yii::$app->request);
    }
}