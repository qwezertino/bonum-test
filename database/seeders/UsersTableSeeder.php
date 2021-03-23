<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 3; $i++) {
            User::create([
                'fullname' => $faker->firstNameMale . ' ' . $faker->lastName,
                'email' => $faker->email,
                'password' => Hash::make('qwerty'),
                'birth_date' => $faker->dateTime,
                'role_id' => rand(1, 3),
                'api_token' => Str::random(60),
            ]);
        }
    }
}
