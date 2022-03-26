<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobCategory;


class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobCategory::create([
            'category_name' => 'Programming'
        ]);
        JobCategory::create([
            'category_name' => 'Driving'
        ]);
        JobCategory::create([
            'category_name' => 'Plumbing'
        ]);
    }
}
