<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['id', 'name', 'email', 'age'];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
