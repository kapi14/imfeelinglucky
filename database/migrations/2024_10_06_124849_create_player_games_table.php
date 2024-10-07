<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('player_games', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('player_id');
            $table->unsignedSmallInteger('random_number');
            $table->decimal('winning_amount');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('player_id')->references('id')->on('players');
        });
    }

    public function down()
    {
        Schema::dropIfExists('player_games');
    }
};
