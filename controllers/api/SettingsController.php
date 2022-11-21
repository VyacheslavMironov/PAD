<?php

namespace app\controllers\api;

use Yii;
use yii\filters\Cors;
use yii\web\UploadedFile;
use app\Services\SettingsInfoService;
use app\Services\SettingsLogoUpdateService;
use app\Services\SettingsLogoDeleteService;

class SettingsController extends \yii\rest\Controller {
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
        // Вызов сервиса принимающего файл
        $service = new SettingsInfoService();
        return $this->asJson(array(
            $service->show(Yii::$app->request)
        ));
    }

    public function actionLogo_update()
    {
        // Вызов сервиса принимающего файл
        $service = new SettingsLogoUpdateService();
        return $this->asJson(array(
            $service->update(Yii::$app->request)
        ));
    }
    
    public function actionLogo_delete()
    {
        $service = new SettingsLogoDeleteService();
        return $this->asJson(array(
            $service->delete(Yii::$app->request)
        ));
    }
}