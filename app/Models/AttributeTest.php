<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeTest extends Model
{
    use HasFactory;
    protected $table= "attribute_tests";
    
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
}
