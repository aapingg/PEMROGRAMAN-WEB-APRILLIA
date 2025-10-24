<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
 
//fungsinya adalah menimpa aturan primary key
//prtotected $primaryKey = 'id_produk';

    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'product_name',
        'unit',
        'type',
        'information',
        'qty',
        'producer',

    ];
}
