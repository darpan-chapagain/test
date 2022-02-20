<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;


class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create([
            'skill' => 'Python'
        ]);
        Skill::create([
            'skill' => 'PHP'
        ]);
        Skill::create([
            'skill' => 'CSS'
        ]);
        Skill::create([
            'skill' => 'Laravel'
        ]);
        Skill::create([
            'skill' => 'Content Writing'
        ]);
        Skill::create([
            'skill' => 'Testing'
        ]);
    }
}
