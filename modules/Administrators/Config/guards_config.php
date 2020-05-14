<?php

return [
    'administrator' => [
        'driver' => 'session',
        'provider' => 'administrators',
    ],

    'administrator-api' => [
        'driver' => 'token',
        'provider' => 'administrators',
        'hash' => false,
    ],
];
