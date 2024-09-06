<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_Detail extends Model
{
    protected $table = 'bill_details';

    public $timestamps = false;

    use HasFactory;

    protected $fillable = ['bill_id', 'product_id', 'amount', 'price', 'subtotal'];
}
