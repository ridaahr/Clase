<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id', 'date', 'product_id', 'client_id'];
    //Los dos últimos atributos se utilizan para la api rest, para no tener que buscar en las tablas el producto y el cliente a la hora de hacer un POST con esos dos campos.

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}