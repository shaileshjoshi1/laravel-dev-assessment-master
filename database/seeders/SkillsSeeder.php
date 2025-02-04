<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skills;
class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $skills = [
            'PHP',
            'Laravel',
            'Livewire',
            'Vue.js',
            'React.js',
            'Node.js',
            'Python',
            'Django',
            'Tailwind CSS',
            'Bootstrap',
            'JavaScript',
            'TypeScript',
            'MySQL',
            'PostgreSQL',
            'MongoDB',
            'AWS',
            'Docker',
            'Git',
            'REST API',
            'GraphQL'
        ];

        foreach ($skills as $skill) {
            Skills::create(['name' => $skill]);
        }

    }
}
