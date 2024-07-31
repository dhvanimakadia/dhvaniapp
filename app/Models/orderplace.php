<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderplace extends Model
{
    use HasFactory;
    public $table = 'orderplace';

    protected $fillable = [
        'productid',
        'totalamt'
    ];

}
