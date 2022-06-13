<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
    ['name',
     'description',
     'image_name',
     'price',
     'sale_price',
     'category_name',
     'created_at',
     'updated_at'];

     public function Categories(){
        return $this->HasMany(Category::class);
     }
}
