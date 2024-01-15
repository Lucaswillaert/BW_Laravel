<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [ 'id','user_id','message','created_at'];

    public function user(){
        return $this->belongsTo(User::class);
        //link voor het koppelen user aan user_id op posts
    }
}
