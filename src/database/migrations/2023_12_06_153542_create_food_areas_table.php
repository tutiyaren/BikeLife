<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodAreasTable extends Migration
{
    /**
     * Run the migrations.
     *_
     * @return void
     */
    public function up()
    {
        Schema::create('food_areas', function (Blueprint $table) {
            $table->id();
            $table->enum('area', ['北海道', '東北', '関東', '中部', '近畿', '中国', '四国', '九州', '沖縄', '海外', 'その他'])->nullable(false);
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
        Schema::dropIfExists('food_areas');
    }
}
