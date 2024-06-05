<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }

     public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function productCount()
    {
        return $this->hasOne(ProductVisit::class,'product_id');
    }
    
     public function city1()
    {
        return $this->belongsTo(City::class,'city_id1');
    }
    public function city3()
    {
        return $this->belongsTo(City::class,'city_id3');
    }
    public function city2()
    {
        return $this->belongsTo(City::class,'city_id2');
    }
}
