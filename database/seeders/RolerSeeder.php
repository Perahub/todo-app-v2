<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            // Roles
            array(
                'id' => 1,
                'name' => 'Admin',
                'guard_name' => 'web'
            ),
            array(
                'id' => 2,
                'name' => 'User',
                'guard_name' => 'web'
            ),
        );

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
