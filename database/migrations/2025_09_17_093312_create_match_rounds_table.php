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
        Schema::create('match_rounds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('match_id')->notNullable()->constrained()->cascadeOnDelete();
            $table->enum('round_number',[1,2,3,4,5,6,7])->nullable()->default(1);
            $table->foreignId('mode_id')->nullable()->constrained()->restrictOnDelete();
            $table->foreignId('town_1')->nullable()->constrained('towns','id')->restrictOnDelete();
            $table->foreignId('hero_1')->nullable()->constrained('heroes','id')->restrictOnDelete();
            $table->foreignId('town_2')->nullable()->constrained('towns','id')->restrictOnDelete();
            $table->foreignId('hero_2')->nullable()->constrained('heroes','id')->restrictOnDelete();
            $table->integer('gold_1')->nullable();
            $table->integer('gold_2')->nullable();
            $table->foreignId('round_winner_id')->nullable()->constrained('match_players')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_rounds');
    }
};
