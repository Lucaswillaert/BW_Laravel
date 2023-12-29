<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'question',
        'answer',
        'created_at',
        'updated_at',
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }
}

