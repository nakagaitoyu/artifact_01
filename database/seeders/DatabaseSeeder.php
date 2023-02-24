<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AnimeSeeder::class,
            ReviewSeeder::class,
            SongSeeder::class,
            CharacterSeeder::class,
            Review_CommentSeeder::class,
            PostSeeder::class,
        ]);
    }
}
