<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobCategory;
use App\Models\Employee;
use App\Models\User;
use App\Models\Job;


class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = ['Programming', 'Driving', 'Plumbing', 'Digital Marketing', 'Dancing'];
        foreach($category as $cat){
            JobCategory::create([
                'category_name' => $cat,
            ]);
        }
        Job::factory()->times(25)->create();

    }
}
