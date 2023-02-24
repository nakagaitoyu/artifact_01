<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_post', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained('posts');
            $table->foreignId('character_id')->constrained('characters');
            $table->primary(['post_id', 'character_id']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_post');
    }
};
