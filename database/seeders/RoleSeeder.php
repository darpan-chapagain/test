<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'Role' => 'Admin'
        ]);
        Role::create([
            'Role' => 'User'
        ]);
        Role::create([
            'Role' => 'Employee'
        ]);
    }
}
