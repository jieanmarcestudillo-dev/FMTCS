<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'prod_id';

    protected $fillable = [
        'prod_name',
        'prod_desc',
        'prod_qty',
        'prod_cost',
        'prod_price',
        'categry',
        'supplier',
        'prod_serial',
        'prod_pic1'
    ];
}
