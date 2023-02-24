<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('animes')->insert([
                'name' => "僕のヒーローアカデミア",
                'overview' => "最高のヒーローになるまでの物語",
                'count_serch' => 10,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
    }
}
