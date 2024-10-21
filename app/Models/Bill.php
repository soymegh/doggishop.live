<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = ['name', 'phone', 'warrant',
    'subtotal', 'total', 'bill_date',
    'payment_type_id', 'user_id'];
}
