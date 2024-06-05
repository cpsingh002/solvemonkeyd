<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVisit extends Model
{
    use HasFactory;
    protected $table="product_visits";
    public function product()  
{
  return $this->belongsTo(Product::class, 'product_id'); 
}
}
