<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user01',
            'email' => 'yu@gmail.com',
            'password' => Hash::make('123456789'),
            'age' => '10',
            'image_url' => url('seeders', ['福徳.png']),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('users')->insert([
            'name' => 'user02',
            'email' => 'jiro@gmail.com',
            'password' => Hash::make('987654321'),
            'age' => '10',
            'image_url'=>asset('img/ひよこ.png'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
