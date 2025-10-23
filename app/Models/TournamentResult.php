<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentResult extends Model
{
    use HasFactory;
     protected $table = 'tournament_result';
    protected $fillable = [
        'player_id','tournament_id','final_place','earned_money'
        
    ];
   
}