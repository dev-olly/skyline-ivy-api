<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'user_id',
        'product_id',
        'status',
    ];
}
