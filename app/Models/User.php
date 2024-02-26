<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    
    protected $fillable = [
        'phone',
        'password',
        'password_salt',
    ];

    protected $hidden = [
        'password_salt',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function info()
    {
        return $this->hasOne(UserInfo::class, 'userId');
    }

    public function interests()
    {
        return $this->hasMany(UserInterest::class, 'userId');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'userId');
    }

    public function likes()
    {
        return $this->hasMany(UserReaction::class, 'to')->where('type', 'like');
    }

    public function dislikes()
    {
        return $this->hasMany(UserReaction::class, 'to')->where('type', 'dislike');
    }

    public function hearts()
    {
        return $this->hasMany(UserReaction::class, 'to')->where('type', 'heart');
    }

    public function reels()
    {
        return $this->hasMany(Reel::class, 'owner');
    }

    public function gallery()  
    {
        return $this->hasMany(Gallery::class, 'userId');
    }
}
