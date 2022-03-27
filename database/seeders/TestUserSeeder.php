<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Job;
use App\Models\UserRoles;
use Illuminate\Support\Facades\Hash;


class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'first_name' => 'test',
            'last_name' => 'last_test',
            'phone_no' => '12345',
            'Address' => 'Sinamangle',
            'Gender' => 'Male',
            'email'=> 'darpan@gmail.com',
            'password'=> Hash::make('pass'),
        ]);

        UserRoles::create([
            'user_id' => 1,
            'role_id' => 1,
        ]); 

        User::factory()->times(101)->create();
        for($i=2;$i<=51;$i++){
            UserRoles::create([
                'user_id' => $i,
                'role_id' => 2,
            ]); 
        }

    }
}
