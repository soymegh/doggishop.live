<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'attendant',
        'email',
        'phone',
        'website',
        'img_url'
    ];
}