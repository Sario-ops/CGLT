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
            'cookieValidationKey' => '-rswbpzfwbOuIzLzt_Kp8BckQqB7bmcK',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'logopedista' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\Logopedista',
            'enableAutoLogin' => true,
            'loginUrl' => ['logopedista/login'],
            'identityCookie' => [
                'name' => '_panelLogopedista',
            ]
        ],
        'caregiver' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\Caregiver',
            'enableAutoLogin' => true,
            'loginUrl' => ['caregiver/login'],
            'identityCookie' => [
                'name' => '_panelCaregiver',
            ]
        ],
        'utente' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\Utente',
            'enableAutoLogin' => true,
            'loginUrl' => ['utente/login'],
            'identityCookie' => [
                'name' => '_panelUtente',
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure transport
            // for the mailer to send real emails.
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
            'enablePrettyUrl' => true,
            //'showScriptName' => false,
            'rules' => [],
        ],
        'assetManager' => [
            'bundles' => [
                'dosamigos\chartjs\ChartJsAsset' => [
                    'sourcePath' => '@vendor/nnnick/chartjs/dist',
                ],
            ],
        ],
    ],
    'modules' => [
        'notifications' => [
            'class' => 'webzop\notifications\Module',
            'channels' => [
                'screen' => [
                    'class' => 'webzop\notifications\channels\ScreenChannel',
                ],
                'email' => [
                    'class' => 'webzop\notifications\channels\EmailChannel',
                    'message' => [
                        'from' => 'example@email.com'
                    ],
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
