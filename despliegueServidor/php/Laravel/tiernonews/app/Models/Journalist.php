<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journalist extends Model
{
    //private int $id;
    //private string $name;
    //private string $surname;
    //private string $email;
    //private string $password;

    //Si la tabla se llamara diferente al modelo en plural
    //protected $table = "periodistas";
    protected $fillable = ["id", "name", "surname", "email", "password"];

    //un periodista tiene varios artículos (1-n)
    public function articles() {
        return $this->hasMany(Article::class);
    }
}