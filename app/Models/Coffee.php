<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    protected $table = 'coffies';
    protected $fillables = [
        'name',
        'price',
        'description',
        'image'
    ];
}
