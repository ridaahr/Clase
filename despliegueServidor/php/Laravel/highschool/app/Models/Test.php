<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['id', 'name', 'numberQuestions', 'type', 'subject_id'];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
