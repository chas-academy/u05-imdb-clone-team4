<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddedMovie extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'movie_id'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function movie()
    {
        return $this->belongsTo(\App\Models\Movie::class);
    }

}