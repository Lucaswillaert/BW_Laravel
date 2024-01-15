<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_id', 'message', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
        //link voor het koppelen user aan user_id op posts
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
        //link voor het koppelen comments aan post_id op comments
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
        //link voor het koppelen likes aan post_id op likes
    }

    
}
