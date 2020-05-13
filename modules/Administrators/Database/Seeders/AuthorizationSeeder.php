<?php


namespace PiloteFramework\Administrators\Database\Seeders;


use Illuminate\Database\Seeder;

class AuthorizationSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
