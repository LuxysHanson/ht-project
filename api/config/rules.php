<?php

return [
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => 'city',
        'except' => ['view', 'create', 'update', 'delete']
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => 'country',
        'except' => ['view', 'create', 'update', 'delete']
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => 'direction',
        'except' => ['view', 'update', 'delete']
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => 'total',
        'except' => ['view', 'create', 'update', 'delete']
    ],
];