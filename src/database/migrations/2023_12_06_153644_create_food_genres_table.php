<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_genres', function (Blueprint $table) {
            $table->id();
            $table->enum('genre', ['米類', '麺類', 'パン類', '肉', '魚', '野菜', 'デザート', 'スープ', '飲み物', 'その他'])->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_genres');
    }
}
