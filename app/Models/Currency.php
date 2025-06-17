<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id','name','avatar'
        'price',
        'active',
        'sort',
    ];
    protected $hidden = [
        'pasword',
        'remember_token',
    ];
    protected $casts = [
        'price' => 'float',
        'active' => 'boolean',
        // 'secret' => 'encrypted',
    ];
    protected $dates =[
        'updated_at'
    ];
    //  protected $guarded = [
    //    'secret'
    // ];
    // $data = $request->all();

    // Post::create($data);
}
