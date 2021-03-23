<?php

namespace Database\Seeders;

use App\Models\ArticleStatus;
use Illuminate\Database\Seeder;

class ArticleStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ArticleStatus::truncate();

        $statuses = ['PUBLISHED', 'NOT PUBLISHED', 'BLOCKED'];

        foreach ($statuses as $key => $status) {
            ArticleStatus::create([
                'name' => $status,
            ]);
        }
    }
}
