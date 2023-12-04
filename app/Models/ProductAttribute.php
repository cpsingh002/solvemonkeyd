<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $table="product_attributes";

    public function attribute()
    {
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
    public function attributeoption()
    {
        return $this->belongsTo(AttributeOption::class,'attoption_id');
    }
}
