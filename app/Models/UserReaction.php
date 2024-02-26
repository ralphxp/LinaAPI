<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'by',
        'to',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'by');
    }
}
