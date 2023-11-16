<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'offered_id',
        'status',
    ];

    public function offered()
    {
        return $this->belongsTo(Offered::class, 'offered_id');
    }
}
