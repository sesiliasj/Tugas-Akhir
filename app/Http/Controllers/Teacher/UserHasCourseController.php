<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserHasCourse;

class UserHasCourseController extends Controller
{
    public function getCourseId($user_id)
    {
        $course = UserHasCourse::where('user_id', $user_id)->get()->first();
        if (!$course) {
            return '';
        }
        return $course['course_id'];
    }
}
