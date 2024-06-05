<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\UserHasCourse;
use Illuminate\Http\Request;

class UserHasCourseController extends Controller
{
    public function getCourseId($user_id)
    {
        $course = UserHasCourse::where('user_id', $user_id)->get()->pluck('course_id');
        if (!$course) {
            return [];
        }
        return $course;
    }
}
