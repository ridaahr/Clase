<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['id', 'name', 'salary', 'email', 'active'];

    public function subjects() {
        return $this->hasMany(Subject::class);
    }
}
