<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_id',
        'user_id',
        'movie_id',
        'title',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status_id' => 'integer',
        'user_id' => 'integer',
        'movie_id' => 'integer',
    ];

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function movie()
    {
        return $this->belongsTo(\App\Models\Movie::class);
    }
}
