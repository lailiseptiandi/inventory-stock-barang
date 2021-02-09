<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::create([
            'name' => 'laili',
            'email' => 'lailiseptiandi2@gmail.com',
            'password' => bcrypt('123qweasd'),
        ]);

        $role = Role::find(1);
        $permissions = Permission::all();

        // assign ke permission
        $role->syncPermissions($permissions);

        $users = User::find(1);
        $users->assignRole($role->name);
    }
}
