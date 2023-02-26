<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert([
                'name' => "緑谷出久",
                'overview' => "個性:ワンフォーオール",
                'anime_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('characters')->insert([
                'name' => "江戸川コナン",
                'overview' => "小学生",
                'anime_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
