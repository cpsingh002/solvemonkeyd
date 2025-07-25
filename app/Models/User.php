<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'otp_code'
     
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function planpurchade()
    {
        return $this->hasOne(PackagePurchase::class,'user_id')->where('status',1);
    }
    public function planpurchadeactive()
    {
        return $this->hasOne(PackagePurchase::class,'user_id')->where('status',1);
    }
    public function countrys()
    {
        return $this->belongsTo(Country::class,'country');
    }
    public function states()
    {
        return $this->belongsTo(State::class,'state');
    }
     public function citys()
    {
        return $this->belongsTo(City::class,'city');
    }
}
