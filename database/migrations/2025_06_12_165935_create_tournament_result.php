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

           
            
            $table->foreignId('player_id')->constrained('players')->onDelete('cascade');
           
            $table->foreignId('tournament_id')->constrained('tournaments')->onDelete('cascade');
           
            $table->unsignedSmallInteger('final_place')->nullable();
            $table->string('earned_money')->nullable();
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
