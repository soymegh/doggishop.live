<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['id', 'date_shipping', 'date_shipping', 'municipalities_id', 'departments_id', 'user_id', 'bill_id', 'status'];
}
