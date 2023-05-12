<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(1);
        
        $user = User::where('name', 'LIKE', 'Daniel%')->get();

        $role = Role::create(['name' => 'apicaller']);
        $permission = Permission::create(['name' => 'api']);

        $role->givePermissionTo($permission);

        $user->assignRole('apicaller');
    }
}
