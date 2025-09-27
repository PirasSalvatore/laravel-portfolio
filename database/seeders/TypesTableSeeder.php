<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = config('types');

        foreach ($types as $type) {
            $newType = new Type();// creo una nuova istanza del modello Type

            $newType->name = $type['name'];
            $newType->description = $type['description'];

            $newType->save();// salvo il nuovo tipo nel database
        }
    }
}
