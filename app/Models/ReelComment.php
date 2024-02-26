<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReelComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'by',
        'on',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'by');
    }

    public function reel()
    {
        return $this->belongsTo(Reel::class, 'on');
    }
}
