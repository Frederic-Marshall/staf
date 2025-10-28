<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Главный администратор']);
        $managerRole = Role::create(['name' => 'Менеджер']);

        $permissions = [
            'admin_panel',
            'admin_edit_users',
            'admin_edit_roles',
            'admin_edit_permissions',
        ];

        foreach ($permissions as $perm) {
            Permission::create(['name' => $perm]);
        }

        $adminRole->givePermissionTo($permissions);
        $admin = User::first();
        $manager = User::where('id', 2)->first();
        $admin->assignRole($adminRole);
        $manager->assignRole($managerRole);
    }
}
