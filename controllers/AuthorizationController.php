<?php
namespace app\controllers;

use app\models\Users;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;

/**
 * Class AuthorizationController
 */
class AuthorizationController extends Controller
{
    /**
     * @SWG\Get(path="/authorization",
     *     tags={"Users"},
     *     summary="Retrieves the collection of Users resources.",
     *     @SWG\Response(
     *         response = 200,
     *         description = "Users collection response",
     *         @SWG\Schema(ref = "#/definitions/Authorization")
     *     ),
     * )
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find(),
        ]);

        return $dataProvider;
    }
}