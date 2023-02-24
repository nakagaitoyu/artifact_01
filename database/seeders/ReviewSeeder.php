<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
                'title' => "おすすめアニメ",
                'body' => "面白い",
                'user_id' => 1,
                'anime_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
