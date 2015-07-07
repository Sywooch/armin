<?php
return [
    // set target language to be Russian
    'language' => 'uk-UK',

    // set source language to be English
    'sourceLanguage' => 'en-US',

    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
