<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $table->foreignId('day_id')->constrained()->cascadeOnDelete();
            $table->foreignId('distance_id')->constrained()->cascadeOnDelete();
            $table->date('date')->nullable(false);
            $table->string('destination', 50)->nullable();
            $table->string('content', 255)->nullable(false);
            $table->timestamp('created_at')->userCurrent()->nullable();
            $table->timestamp('updated_at')->userCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourings');
    }
}
