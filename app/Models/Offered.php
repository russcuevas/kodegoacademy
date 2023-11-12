<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offered extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position_id',
        'course_id',
        'course_picture',
        'course_description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}