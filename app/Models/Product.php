<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['name','description','image_name','price','sale_price','categories_id'];

     public function Categories(){
        return $this->belongsTo(Category::class);
     }
}
