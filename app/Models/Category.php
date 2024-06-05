<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class,'category_id');
    }
    public function subCategoriesHead()
    {
        return $this->hasMany(SubCategory::class,'category_id')->where('status',1);
    }
    public function brands()
    {
        return $this->hasMany(Brand::class,'category_id')->where('status',1);
    }
    public function products()
    {
        return $this->hasMany(Product::class,'category_id')->where('status',1);
    }
    public function productcount()
    {
        return $this->hasMany(Product::class,'category_id')->where('status',1);
    }
}
