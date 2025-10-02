<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamentos extends Model
{
    protected $fillable = ['name', 'lot', 'validity', 'price', 'stock'];
}
