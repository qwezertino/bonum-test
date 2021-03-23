<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Article::create([
                'title' => $faker->sentence,
                'short_description' => $faker->paragraph,
                'description' => $faker->paragraph,
                'status_id' => rand(1, 3),
                'user_id' => rand(1,3),
            ]);
        }
    }
}
