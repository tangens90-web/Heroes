<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MatchPlayers extends Model
{
    use HasFactory;
   public function match()
    {
        return $this->belongsTo(Matches::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
