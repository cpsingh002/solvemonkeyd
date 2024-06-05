<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = "attributes";

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function attributeoptions()
    {
        return $this->hasMany(AttributeOption::class,'attribute_id');
    }
    public function attributecount()
    {
        return $this->hasMany(ProductAttribute::class,'attoption_id');
    }
}
