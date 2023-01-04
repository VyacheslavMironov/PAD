<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'UU0rgx50Xc29MNHRsnFAgONWkZ40Zt7m',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => yii\swiftmailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'encryption' => 'ssl',
                'host' => 'smtp.yandex.ru',
                'port' => '465',
                'username' => 'vuacheslavmironov@yandex.ru',
                'password' => 'dscfdnwffnguymrn',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=>false,
                    'controller' => ['api/organization'],
                    'extraPatterns' => [
                        'POST create' => 'create'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=>false,
                    'controller' => ['api/authorization'],
                    'extraPatterns' => [
                        'POST auth' => 'auth'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=>false,
                    'controller' => ['api/upload'],
                    'extraPatterns' => [
                        'POST save' => 'save'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=>false,
                    'controller' => ['api/user'],
                    'extraPatterns' => [
                        'GET info' => 'info',
                        'PUT activate' => 'activate',
                        'POST create' => 'create',
                        'GET show' => 'show',
                        'GET show/one' => 'show-one',
                        'PUT update' => 'update'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=>false,
                    'controller' => ['api/reset'],
                    'extraPatterns' => [
                        'PUT password' => 'password'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=>false,
                    'controller' => ['api/lesson'],
                    'extraPatterns' => [
                        'POST create' => 'create',
                        'GET list' => 'list',
                        'PUT update' => 'update',
                        'DELETE delete' => 'delete'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=>false,
                    'controller' => ['api/settings'],
                    'extraPatterns' => [
                        'GET info' => 'info',
                        'POST logo/update' => 'logo_update',
                        'DELETE logo/delete' => 'logo_delete',
                        'PUT update/value-type' => 'update_value_type',
                        'GET show/priveleges-admin' => 'priveleges_admin_show',
                        'PUT update/priveleges-admin' => 'priveleges_admin_update',
                        'PUT update/service-connect' => 'service_connect_update'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=>false,
                    'controller' => ['api/filial'],
                    'extraPatterns' => [
                        'POST create' => 'create',
                        'GET show' => 'show',
                        'DELETE delete' => 'delete'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=> false,
                    'controller' => ['api/group'],
                    'extraPatterns' => [
                        'POST create' => 'create',
                        'GET list' => 'list',
                        'GET show' => 'show',
                        'GET delete' => 'delete',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=> false,
                    'controller' => ['api/user-group'],
                    'extraPatterns' => [
                        'GET show' => 'show',
                        'GET user/not-group' => 'not',
                        'POST create' => 'create',
                        'GET remove' => 'remove',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=> false,
                    'controller' => ['api/timetable'],
                    'extraPatterns' => [
                        'POST create' => 'create',
                        'GET show' => 'show',
                        'GET show/teacher' => 'show-teacher'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=> false,
                    'controller' => ['api/statement'],
                    'extraPatterns' => [
                        'POST create' => 'create',
                        'GET list' => 'list',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=> false,
                    'controller' => ['api/user-value'],
                    'extraPatterns' => [
                        'GET show' => 'show',
                    ]
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
