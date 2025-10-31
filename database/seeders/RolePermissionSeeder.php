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
        $roleConfig = config('permissions.local');

        foreach ($roleConfig as $role => $permissions) {
            $role = Role::firstOrCreate(['name' => $role]);

            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
            }

            $role->givePermissionTo($permissions);
        }

        $admin = User::where('id', '1')->first();
        $author = User::where('id', '2')->first();
        $mainManager =  User::where('id', '3')->first();
        $contentManager = User::where('id', '4')->first();

        $admin->assignRole('Главный администратор');
        $author->assignRole('Автор');
        $mainManager->assignRole('Главный менеджер');
        $contentManager->assignRole('Менеджер по контенту');
    }
}
