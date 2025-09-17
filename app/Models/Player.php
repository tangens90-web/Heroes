<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    public function matches()
{
    return $this->belongsToMany(Matches::class, 'match_players', 'player_id', 'match_id')
                ->withPivot('side')
                ->withTimestamps();
}
     public function results()
    {
        return $this->hasMany(Result::class);
    }
    protected $fillable = [
        'username',
        'name',
        'surname',
        'country',
        'birthday',
        'avatar'
    ];
    protected $casts = [
    'birthday' => 'date', 
];
}
