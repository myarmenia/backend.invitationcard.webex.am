<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::updateOrCreate(
             ['email' => 'info@webex.am'],
             [
                'name' => 'Webex Admin',
                'email' => 'info@webex.am',
                'password' => bcrypt(env('ADMIN_PASS'))
            ]);


        $role = Role::updateOrCreate(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
