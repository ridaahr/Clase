<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id', 'name', 'price', 'size', 'description'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}