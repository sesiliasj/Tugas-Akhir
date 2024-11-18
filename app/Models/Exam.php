<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'course_id',
        'is_open',
    ];

    public function contents()
    {
        return $this->hasMany(Examcontent::class);
    }
}
