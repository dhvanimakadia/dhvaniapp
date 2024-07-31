<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public $table = 'owner';
    
    public $fillable = [
        'name',
        'email',
        'image',
        'role'
    ];
    use HasFactory;
}
