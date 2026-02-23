<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id', 'title', 'content', 'author_id'];

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
