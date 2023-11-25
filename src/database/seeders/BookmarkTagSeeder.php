<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookmarkTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookmark_tag')->insert([
            [
                'bookmark_id' => 1,
                'tag_id' => 1
            ],
            [
                'bookmark_id' => 1,
                'tag_id' => 2
            ],
            [
                'bookmark_id' => 2,
                'tag_id' => 3
            ],
            [
                'bookmark_id' => 2,
                'tag_id' => 4
            ]
        ]);
    }
}
