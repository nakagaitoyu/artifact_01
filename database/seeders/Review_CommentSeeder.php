<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Review_CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('review_comments')->insert([
                'user_id' => 2,
                'review_id' => 1,
                'body' => "ユーザー２のコメント内容",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
