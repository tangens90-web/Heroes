<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    
    use HasFactory;
    protected $table = 'matches';
    const TYPE_1V1 = '1v1';
    // const TYPE_2V2 = '2v2';
    // const TYPE_1V1V1 = '1v1v1';
    // const TYPE_1V1V1V1 = '1v1v1v1';
    //  public function typeIsAllowed(): bool
    // {
    //     return !in_array($this->type, [self::TYPE_1V1V1, self::TYPE_1V1V1V1]);
    // }
    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stages_id');
    }
     public function players()
    {
        return $this->belongsToMany(Player::class, 'match_players', 'match_id', 'player_id')
                    ->withPivot('side')
                    ->withTimestamps();
    }
    
}
