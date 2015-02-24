<?php
return [
    'name' => 'WIPOCOS',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=rajencba_wipocos',
            'username' => 'rajencba_wipocos',
            'password' => '62)VznT1QZTU',
            'charset' => 'utf8',
            'tablePrefix' => 'wipo_',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
