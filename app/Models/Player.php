<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
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
