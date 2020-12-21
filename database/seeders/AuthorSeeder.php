<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            DB::table('authors')->insert([
                'name' => $faker->name(),
                'dateOfBirth' => $faker->numberBetween(1900, 1950),
                'dateOfDeath' => $faker->numberBetween(1950, 2000),
            ]);
        }
    }
}
