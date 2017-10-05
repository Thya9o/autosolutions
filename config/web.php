<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'LAUQ_XSYuSvr_t-EKTSxVIGSImnWAgZb',
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
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
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
   			'class' => 'yii\web\UrlManager',
   			'showScriptName' => false,
   			'enablePrettyUrl' => true,
   			'rules' => array(
   					'<controller:\w+>/<id:\d+>' => '<controller>/view',
   					'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
   					'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
   			),
    	],
    ],
    'params' => $params,
    'modules' => [
        'gridview' =>  [
            'class' => 'kartik\grid\Module'
        ],
    ],
];

if(YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
