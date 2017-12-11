<?php
return [
    'user-groups' => [
        'name' => 'User Groups',
        'action' => [
            'index' => [
                'name' => 'Read',
                'allow' => ['index', 'show']
            ],
            'create' => [
                'name' => 'Create',
                'allow' => ['create', 'store']
            ],
            'edit' => [
                'name' => 'Update',
                'allow' => ['edit', 'update']
            ],
            'destroy' => [
                'name' => 'Delete',
                'allow' => ['destroy']
            ],
        ],
    ],

    'users' => [
        'name' => 'Users',
        'action' => [
            'index' => [
                'name' => 'Read',
                'allow' => ['index', 'show']
            ],
            'create' => [
                'name' => 'Create',
                'allow' => ['create', 'store']
            ],
            'edit' => [
                'name' => 'Update',
                'allow' => ['edit', 'update']
            ],
            'destroy' => [
                'name' => 'Delete',
                'allow' => ['destroy']
            ], 
        ],
    ], 
];