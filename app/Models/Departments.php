<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $table = 'departments';

    public $timestamps = false;

    use HasFactory;

    protected $fillable = ['id', 'name'];

    public function municipalities()
    {
        return $this->hasMany(Municipalities::class);
    }
}
