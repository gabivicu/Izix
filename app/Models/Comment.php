<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['article_id', 'user_id', 'comment'];

    public static $rules = [
        'comment' => 'string',
    ];
    
}


