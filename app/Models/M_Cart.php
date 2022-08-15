<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Cart extends Model
{
    use HasFactory;
    protected $table = "cart";
    protected $fillable = [
        'kd_produk',
        'qty'
    ];
}
