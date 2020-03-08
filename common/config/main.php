<?php

    return [
        'timeZone'   => 'America/New_York',
        'basePath'   => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
        'name'       => 'Poormnan`s Online Directory',
        'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
        'components' => [
            'urlManager' => [
                'class'           => 'yii\web\UrlManager',
                // Disable index.php
                'showScriptName'  => FALSE,
                // Disable r= routes
                'enablePrettyUrl' => TRUE,
                'rules'           => array(
                    //custom url for backend
                    'user/update-administrator/<username:[a-zA-Z0-9-]+>/'                     => 'user/update-administrator',
                    'user/view-administrator/<username:[a-zA-Z0-9-]+>/'                       => 'user/view-administrator',
                    'user/update-operator/<username:[a-zA-Z0-9-]+>/'                          => 'user/update-operator',
                    'user/view-operator/<username:[a-zA-Z0-9-]+>/'                            => 'user/view-operator',
                    'user/update-client/<username:[a-zA-Z0-9-]+>/'                            => 'user/update-client',
                    'user/view-client/<username:[a-zA-Z0-9-]+>/'                              => 'user/view-client',

                    //custom url for frontend
                    'verification/email/<username:[a-zA-Z0-9-_]+>/<token:[a-zA-Z0-9-_]+>/'    => 'verification/email',
                    'verification/password/<username:[a-zA-Z0-9-_]+>/<token:[a-zA-Z0-9-_]+>/' => 'verification/password',
                    'business/<id:[a-zA-Z0-9-]+>/'                                            => 'business',
                    'categories/<id:[a-zA-Z0-9-]+>/'                                          => 'categories',
                    'categories/item/<id:[a-zA-Z0-9-]+>/'                                     => 'categories/item',


                    'signup/checkout/' => 'signup/checkout',
                    'signup/place-order' => 'signup/place-order',
                    'signup/update' => 'signup/update',
                    'signup/<type:[a-zA-Z0-9-]+>/' => 'signup/index',


                    'directory/view/<string:[a-zA-Z0-9-]+>/' => 'directory/list',
                    // For backend
                    'directory/add/<type:[a-zA-Z0-9-]+>/'    => 'directory/add/',
                    'directory/list/<type:[a-zA-Z0-9-]+>/'   => 'directory/',
                    'directory/listing/<type:[a-zA-Z0-9-]+>' => 'directory/listing',
                    [
                        'pattern'      => 'directory/listing/<type:[a-zA-Z0-9-]+>/<id:[a-zA-Z0-9-]+>/',
                        'route'        => 'directory/listing/',
                        'encodeParams' => FALSE,
                    ],

                    //url pattern
                    '<controller:\w+>/<id:\d+>'              => '<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
                ),
            ],
            'cache'      => [
                'class' => 'yii\caching\FileCache',
            ],
            'user'       => [
                'identityClass'   => 'common\models\User',
                'loginUrl'        => [''],
                'enableAutoLogin' => FALSE,
            ],
            'request'    => array(
                'enableCsrfValidation' => TRUE,
            ),
            'misc'       => [
                'class' => 'common\components\Misc',
            ],
        ],
    ];
