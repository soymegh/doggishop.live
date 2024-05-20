<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventary extends Model
{
    use HasFactory;
    
    //relación con producto
    public function product(){
        return $this->belongsTo(Product::class);
    }

    //relación con usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    //mostar el nombre del producto
    public function getProduct(){
        return $this->product->name;
    }

    //mostrar el nombre del usuario
    public function getUser(){
        return $this->user->name;
    }
}