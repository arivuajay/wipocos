<?php

$config = [
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'email-smtp.us-east-1.amazonaws.com',
                'username' => 'AKIAIBZNBZLWKUC3JOFQ',
                'password' => 'AvZezn7/+27DLPcow+itmlXHl8z7K5QrQki1XxUzom3S',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ],
];
if (!YII_ENV_PROD) {
    $config['components']['db'] = [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'tablePrefix' => 'wipo_',
    ];
} else {
    $config['components']['db'] = [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=rajencba_wipocos',
        'username' => 'rajencba_wipocos',
        'password' => '62)VznT1QZTU',
        'charset' => 'utf8',
        'tablePrefix' => 'wipo_',
    ];
}

return $config;
