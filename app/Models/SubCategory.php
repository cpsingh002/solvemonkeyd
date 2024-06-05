<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = "sub_categories";

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brands()
    {
        return $this->hasMany(Brand::class,'subcategory_id');
    }
    public function attributes()
    {
        return $this->hasMany(Attribute::class,'subcategory_id');
    }
    public function productcount()
    {
        return $this->hasMany(Product::class,'subcategory_id')->where('status',1);
    }
    
}
