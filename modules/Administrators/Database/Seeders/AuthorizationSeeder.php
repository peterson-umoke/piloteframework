<?php


namespace PiloteFramework\Administrators\Database\Seeders;


use Illuminate\Database\Seeder;
use PiloteFramework\Administrators\Models\Administrator;
use PiloteFramework\Administrators\Models\Permissions;
use PiloteFramework\Administrators\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AuthorizationSeeder extends Seeder
{
    public function run()
    {
        $this->command->info("Resetting the cached roles and permissions");
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $config = config("administrator.auth_configurations.roles_structure");
        $permissionMap = config("administrator.auth_configurations.permissions_map");

        $this->command->info("About to insert the roles and permissions");
        foreach ($config as $key => $value) {
            $this->command->info("Creating role: $key");
            $role = Role::create([
                "name" => $key,
                "guard" => $value['guard_name'],
            ]);
            $this->command->info("role created successfully");
            $permissions = [];


            foreach ($value['permissions'] as $permission_key => $pMap) {
                foreach (explode(",", $pMap) as $pKey => $permission) {
                    $permissionValue = $permissionMap->get($permission);
                    $this->command->info("creating permissions: $permissionValue");

                    $permissions[] = Permissions::firstOrCreate([
                        "name" => $permissionValue . "-" . $permission_key,
                        "guard" => $value['guard_name'],
                    ])->id;
                }
            }

            $this->command->info("attaching permissions");
            $role->syncPermissions($permissions);
            $this->command->info("attached permissions");

            $this->command->info("creating demo accounts");
            foreach ($value['demo_accounts'] as $i => $account) {
                $administrator = Administrator::create([
                    "first_name" => $account['first_name'],
                    "last_name" => $account['last_name'],
                    "email" => $account['email'],
                    "password" => bcrypt($account['password']),
                ]);

                $administrator->syncRoles($role);
            }
            $this->command->info("demo accounts created");

        }
    }
}
