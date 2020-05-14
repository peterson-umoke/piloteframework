<?php

use PiloteFramework\Administrators\Models\Administrator;

return [
    'administrators' => [
        'driver' => 'eloquent',
        'model' => Administrator::class,
    ],
];
