<?php
return [
    'users-group' => [
        'name' => 'Группы пользователей',
        'action' => [
            'index' => [
                'name' => 'Просмотр',
                'allow' => ['index', 'show']
            ],
            'create' => [
                'name' => 'Создание',
                'allow' => ['create', 'store']
            ],
            'edit' => [
                'name' => 'Редактирование',
                'allow' => ['edit', 'update']
            ],
            'destroy' => [
                'name' => 'Удаление',
                'allow' => ['destroy']
            ],
        ],
    ],

    'users' => [
        'name' => 'Пользователи',
        'action' => [
            'index' => [
                'name' => 'Просмотр',
                'allow' => ['index', 'show']
            ],
            'create' => [
                'name' => 'Создание',
                'allow' => ['create', 'store']
            ],
            'edit' => [
                'name' => 'Редактирование',
                'allow' => ['edit', 'update']
            ],
            'destroy' => [
                'name' => 'Удаление',
                'allow' => ['destroy']
            ], 
        ],
    ], 
];