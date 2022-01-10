<?php

return [
    'super_admin' => [
        'roles' => 'super admin',
    ],

    'admin' => [
        'roles' => [
            'service management',
            'category management',
            'account management',
        ],
        'permissions' => [
            // service
            'add tour',
            'edit tour',
            'delete tour',
            'add image tour',
            'delete image tour',
            'add tour plan',
            'edit tour plan',
            'delete tour plan',

            'add booking',
            'edit booking',
            'delete booking',

            'view transaction',
            'view report',

            // category
            'add tag',
            'edit tag',
            'delete tag',

            'add vehicle',
            'edit vehicle',
            'delete vehicle',

            'add slider',
            'edit slider',
            'delete slider',

            'add article',
            'edit article',
            'delete article',

            'add area',
            'edit area',
            'delete area',

            'add location',
            'edit location',
            'delete location',

            'add promotion',
            'edit promotion',
            'delete promotion',

            'add contact',
            'edit contact',
            'delete contact',

            'add about',
            'edit about',
            'delete about',

            // account
            'add account',
            'edit account',
            'decentralization',
        ],
    ],
];
