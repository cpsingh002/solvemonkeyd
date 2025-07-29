<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePurchase extends Model
{
    use HasFactory;
    protected $table="package_purchases";
    protected $guarded = [];
    public function validitycount()
    {
        return $this->belongsTo(Package::class,'package_id');
    }
}
