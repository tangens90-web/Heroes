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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string('username');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('birthday')->nullable();
            $table->string('rating')->nullable();

            $table->string('avatar')->nullable();

            $table->boolean('active')->default(true);

            $table->string('country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
        Schema::dropIfExists('tournament_result');
    }
};
