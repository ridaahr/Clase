<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['id', 'name', 'duration', 'teacher_id'];

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }
}
