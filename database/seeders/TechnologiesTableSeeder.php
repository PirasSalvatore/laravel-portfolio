<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Models\Technology;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = [
            ['name' => 'PHP'],
            ['name' => 'JavaScript'],
            ['name' => 'Laravel'],
            ['name' => 'Vue.js'],
            ['name' => 'MySQL'],
            ['name' => 'HTML5'],
            ['name' => 'Bootstrap'],
            ['name' => 'GitHub'],
            ['name' => 'Docker'],
            ['name' => 'REST API'],
            ['name' => 'GraphQL'],
            ['name' => 'Redis'],
            ['name' => 'Node.js'],
            ['name' => 'Express.js'],
            ['name' => 'TypeScript'],
            ['name' => 'Sass'],
            ['name' => 'Webpack'],
        ];

        foreach($technologies as $technology){

            $newTecnology = new Technology();

            $newTecnology->name = $technology['name'];
            $newTecnology->color = $faker->hexColor();

            $newTecnology->save();
        }
    }
}
