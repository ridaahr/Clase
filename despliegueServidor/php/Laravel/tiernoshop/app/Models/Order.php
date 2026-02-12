<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "id",
        "id_client",
        "id_product",
        "date"
    ];

    public function client() {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function product() {
        return $this->hasMany(Product::class, 'id_product');
    }
}
