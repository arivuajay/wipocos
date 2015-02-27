<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-application',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'application\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'marudhuofficial@gmail.com',
                'password' => 'ninja12345',
                'port' => '587',
//                'host' => 'email-smtp.us-east-1.amazonaws.com',
//                'username' => 'AKIAIBZNBZLWKUC3JOFQ',
//                'password' => 'AvZezn7/+27DLPcow+itmlXHl8z7K5QrQki1XxUzom3S',
//                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ],
    'params' => $params,
];
