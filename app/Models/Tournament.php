<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
      protected $fillable = [
        'title','number_participants','prize_fund','image'
        
    ];
    public function players()
{
    // Связь многие-ко-многим с дополнительными полями через pivot таблицу tournament_result
    return $this->belongsToMany(Player::class, 'tournament_result')
                ->withPivot('final_place', 'earned_money')
                ->withTimestamps();
}
    // public function players()
// {
//     return $this->belongsToMany(Player::class, 'player')
//                 ->withPivot('final_place')
//                 ->withTimestamps();
// }
}
