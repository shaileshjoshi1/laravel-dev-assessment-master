<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Job;
class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Job::create([
            'title' => 'Sr. Web Developer',
            'description' => 'Develop and maintain web applications.',
            'experience' => '7-14 years',
            'salary' => '7-15 Lacs PA',
            'location' => 'New York',
            'extra_info' => 'Full time,Remote',
            'company_name' => 'TechCorp',
            'logo' => 'job_logos/logo-2.svg',
        ]);

        Job::create([
            'title' => 'Sr. Frontend Developer',
            'description' => 'Work on UI/UX using Vue.js and Tailwind.',
            'experience' => '4-11 years',
            'salary' => '9-15 Lacs PA',
            'location' => 'San Francisco',
            'extra_info' => 'Full time,On-site',
            'company_name' => 'WebDesign Inc.',
            'logo' => 'job_logos/logo-3.svg',
        ]);
    }
}
