<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipalities extends Model
{

    protected $table = 'municipalities';

    public $timestamps = false;

    use HasFactory;

    protected $fillable = ['id', 'name', 'departments_id'];

}
