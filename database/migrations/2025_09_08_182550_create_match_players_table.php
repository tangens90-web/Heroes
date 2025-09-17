<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
    {
        Schema::create('match_players', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('match_id')->constrained()->onDelete('cascade');
            $table->foreignId('player_id')->nullable()->constrained()->onDelete('cascade');
            // Если у вас есть команды, можно добавить team_id:
            // $table->foreignId('team_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('side', ['1', '2']);// 1 или 2 — сторона в матче
            $table->boolean('match_result')->nullable()->default(false);
            $table->enum('result_points',['0','1','2','3'])->nullable()->default('0');

            // Чтобы не было дубликатов (один игрок в одном матче несколько раз)
            $table->unique(['match_id', 'player_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('match_players');
    }
};
