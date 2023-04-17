<?php

namespace App\Models;
use App\Models\Comment;

use Illuminate\Database\Eloquent\Model;
 
class Article extends Model
{
    protected $fillable = ['title', 'author', 'content'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }


    public static $rules = [
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'content' => 'required|string',
    ];
    
}
