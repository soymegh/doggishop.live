<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'breed',
        'gender', 
        'age',
        'price',
        'img_url',
        'pet_type_id',
        'status'
    ];

    public static function boot(){
        parent::boot();

        static::creating(function($pet){
            $pet->name = uniqid('pet-');
        });
    }
}