<?php

return [    

        'guards' => [
                'springadmins' => [
                    'driver' => 'session',
                    'provider' => 'springadmins',
                ]
            ],
        'providers' => [
            'springadmins' => [
                'driver' => 'eloquent',
                'model' => SpringCms\SpringAdmins\Models\SystemUser::class,
            ]
        ],
        'passwords' => [
            'springadmins' => [
                'provider' => 'springadmins',
                'table' => 'password_resets',
                'expire' => 60,
            ],

        ],
];
