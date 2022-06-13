<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $table = 'carts';

    protected $fillable =
    ['user_id',
     'product_id',
     'quantity',
     'price',
     'created_at',
     'updated_at'];
     /**
      * Relacion con producto
      */
    public function product(){
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
