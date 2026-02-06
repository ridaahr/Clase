<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ["id", "title", "content", "readers", "journalist_id"];

    //relacion 1- con journalist
    public function journalist() {
        return $this->belongsTo(Journalist::class);
    }
}
