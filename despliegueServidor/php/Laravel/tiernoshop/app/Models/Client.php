<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        "id",
        "name",
        "surname",
        "email"
    ];

    public function orders() {
        return $this->hasMany(Order::class, 'id_client');
    }
}
