<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\Technology;

class Project_TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        $technologies = Technology::all();

        foreach ($projects as $project) {
            // Associa da 1 a 3 tecnologie casuali a ogni progetto
            $randomTechnologies = $technologies->random(rand(1, 3))->pluck('id')->toArray();
            // associo le tecnologie al progetto
            $project->technologies()->sync($randomTechnologies);
        }
    }
}
