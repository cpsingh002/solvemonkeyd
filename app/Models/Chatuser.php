<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatuser extends Model
{
    use HasFactory;
    protected $table='chatusers';
    protected $fillable=[
        'user_id',
        'chat_id',
        'friend_id',
        'product_id',
    ];


    /**
     * Get the user that owns the frinds
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function nextuser()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
