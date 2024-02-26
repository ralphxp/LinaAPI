<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reel extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner',
        'resource',
        'caption'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function likes()
    {
        return $this->hasMany(ReelReaction::class, 'on')->where('type', 'like');
    }

    public function dislikes()
    {
        return $this->hasMany(ReelReaction::class, 'on')->where('type', 'dislike');
    }

    public function hearts()
    {
        return $this->hasMany(ReelReaction::class, 'on')->where('type', 'heart');
    }

    public function comments()
    {
        return $this->hasMany(ReelComment::class, 'on');
    }

    public function shares()
    {
        return $this->hasMany(ReelReaction::class, 'on')->where('type', 'share');
    }
}
