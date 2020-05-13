<?php

return [
    "permissions_map" => [
        "b" => "browse",
        "r" => "read",
        "e" => "edit",
        "a" => "add",
        "d" => "delete",
    ],
    "roles_structure" => [
        "superadministrator" => [
            "guard_name" => "administrator",
            "permissions" => [
                "users" => "b,r,e,a,d",
                "administrators" => "b,r,e,a,d",
                "roles" => "b,r,e,a,d",
                "permissions" => "b,r,e,a,d",
                "menus" => "b,r,e,a,d",
                "settings" => "b,r,e,a,d",
            ],
            "demo_accounts" => [
                [
                    "first_name" => "Peterson",
                    "last_name" => "Umoke",
                    "email" => "super@app.com",
                    "password" => "password",
                ],
            ],
        ],
    ]
];
