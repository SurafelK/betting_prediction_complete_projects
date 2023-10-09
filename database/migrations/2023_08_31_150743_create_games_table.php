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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('game_time')->nullable(false);
            $table->string('game_date')->nullable(false);
            $table->unsignedBigInteger('home_team')->nullable(false);
            $table->unsignedBigInteger('away_team')->nullable(false);
            $table->string('game_result')->nullable();
            $table->unsignedBigInteger('prediction')->nullable(false);
            $table->string('description', 5000)->nullable(false);
            $table->float('odd')->nullable(false);
            $table->integer('game_number')->unsigned()->nullable(false);
            $table->timestamps();
            $table -> foreign("prediction")->references('id')->on('predictions')->onDelete('cascade')->onUpdate('cascade');
            $table -> foreign('home_team')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table -> foreign('away_team')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
