<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jwellery extends Model
{
    public $table = 'jwellery';
    
    public $fillable = [
        'name',
        'image',
        'price',
        'quantity'
    ];
    use HasFactory;
}
