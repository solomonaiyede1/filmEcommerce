<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table='category';
    protected $fillable = [
        'category_name'
    ];
    public function categoryProduct(){
        $this->hasOne('App\Models\ProductModel::class', 'product_id');
    }

}
