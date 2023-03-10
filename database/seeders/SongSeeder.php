<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
                'name' => "ピースサイン",
                'artist' => "米津玄師",
                'anime_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('songs')->insert([
                'name' => "謎",
                'artist' => "小松未歩",
                'anime_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
