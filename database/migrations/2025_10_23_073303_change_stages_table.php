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
        Schema::table('stages', function (Blueprint $table) {
            
            $table->enum('stage_number', [1, 2, 3, 4, 5])->default(1);
            $table->enum('stage_type', ['group_stage', 'playoff_knockout', 'playoff_group']);
            $table->boolean('isActive')->default(true);
            $table->unique(['tournament_id', 'stage_number']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stages', function (Blueprint $table) {
            //
        });
    }
};
