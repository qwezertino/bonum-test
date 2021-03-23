<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //UserRole::truncate();

        $roles = ['admin', 'user', 'guest'];

        foreach ($roles as $key => $role) {
            UserRole::create([
               'name' => $role,
            ]);
        }
    }
}
