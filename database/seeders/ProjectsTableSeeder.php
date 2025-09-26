<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $project = new Project();

            $project->title = $faker->sentence();
            $project->client = $faker->optional()->company();
            $project->start_date = $faker->dateTimeBetween('-1 year', 'now');
            $project->end_date = $faker->dateTimeBetween($project->start_date, 'now');
            $project->technologies_used = $faker->words(3, true);
            $project->description = $faker->paragraph(5);

            $project->save();
        }
    }
}
