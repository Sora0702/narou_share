<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookmarks')->insert([
            [
                'title' => 'フリードリヒの戦場【書籍化決定】',
                'writer' => 'エノキスルメ',
                'ncode' => 'n6988il',
                'genre' => 102,
                'user_id' => 1
            ],
            [
                'title' => '竜と涙と約束と。',
                'writer' => 'みこと。@【とばり姫コミカライズ発売中】',
                'ncode' => 'n1940im',
                'genre' => 101,
                'user_id' => 2
            ]
        ]);
    }
}
