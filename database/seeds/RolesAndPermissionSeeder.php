<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create games']);
        Permission::create(['name' => 'edit games']);
        Permission::create(['name' => 'delete games']);
        Permission::create(['name' => 'create boardgames']);
        Permission::create(['name' => 'edit boardgames']);
        Permission::create(['name' => 'delete boardgames']);
        Permission::create(['name' => 'create scorecards']);
        Permission::create(['name' => 'edit scorecards']);
        Permission::create(['name' => 'delete scorecards']);
        Permission::create(['name' => 'manage users']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'player'])
                ->givePermissionTo(['create games', 'create scorecards']);

        $role = Role::create(['name' => 'moderator'])
                ->givePermissionTo(['create games', 'edit games', 'delete games', 'create boardgames', 'edit boardgames', 'delete boardgames', 'create scorecards', 'edit scorecards', 'delete scorecards']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
