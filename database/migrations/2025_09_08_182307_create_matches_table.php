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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('start_date')->notNullable();
            $table->date('end_date')->nullable();
            $table->enum('type', ['1v1'])->default('1v1');
            // $table->enum('type', ['1v1', '2v2','1v1v1','1v1v1v1'])->default('1v1');
            $table->foreignId('tournament_id')->nullable()->constrained('tournaments')->onDelete('cascade');
            $table->foreignId('stages_id')->nullable()->constrained('stages')->onDelete('cascade');
            $table->enum('bo_format', ['bo1','bo2','bo3','bo4','bo5'])->nullable();
            $table->enum('status', ['not started','active','finished','cancelled'])->nullable();
            // $table->boolean('active')->default(false);
            $table->enum('winner_player', ['1', '2'])->nullable(); 
            $table->unsignedTinyInteger('result_player_1')->nullable()->default(0);
            $table->unsignedTinyInteger('result_player_2')->nullable()->default(0);
           
            // $table->enum('score', ['1', '2','3','4'])->nullable(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('matches');
    }
};
