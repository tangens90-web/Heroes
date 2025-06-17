<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tournament_result', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('player_id'); // внешний ключ на игроков
            
            $table->unsignedBigInteger('tournament_id');
            // другие поля
            

            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
           
            $table->string('final_place')->nullable();
            $table->string('earned')->nullable();
            $table->unique(['tournament_id', 'player_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournament_result');
        
    }
};
