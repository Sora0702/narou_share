<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'title' => 'tag1',
                'user_id' => 1
            ],
            [
                'title' => 'tag2',
                'user_id' => 1
            ],
            [
                'title' => 'tag3',
                'user_id' => 2
            ],

            [
                'title' => 'tag4',
                'user_id' => 2
            ],
        ]);
    }
}
