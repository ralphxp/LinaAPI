<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReelReaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'by',
        'on',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'by');
    }
}
