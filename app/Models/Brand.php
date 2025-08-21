<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = "brands";

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function modelnumber()
    {
        return $this->hasMany(ModelNumber::class,'brand_id');
    }
    public function brandcount()
    {
        return $this->hasMany(Product::class,'brand_id')->where('status',1)->whereIn('user_verified',['0','2']);
    }
}
