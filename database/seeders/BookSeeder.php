<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
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
            DB::table('books')->insert([
                'name' => $faker->firstName(),
                'yearOfPublishing' => $faker->year(),
                'content' => $faker->paragraph(1, true),
                'author_id' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
