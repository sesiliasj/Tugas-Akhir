<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasCourse extends Model
{
    use HasFactory;

    protected $table = 'users_has_courses';

    protected $fillable = [
        'user_id',
        'course_id',
    ];
}
