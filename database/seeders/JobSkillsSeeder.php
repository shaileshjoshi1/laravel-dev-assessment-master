<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\JobSkills;
use App\Models\Skills;
class JobSkillsSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $job1 = Job::first();
        $job2 = Job::skip(1)->first(); // Get the second job

        
        $skills = Skills::pluck('id')->toArray();

        if ($job1 && $job2 && count($skills) >= 4) {
            
            $job1->skills()->sync([$skills[0], $skills[1]]);

            
            $job2->skills()->sync([$skills[2], $skills[3]]);
        }

    }
}
