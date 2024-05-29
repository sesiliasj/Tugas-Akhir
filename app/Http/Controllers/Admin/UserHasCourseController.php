<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\UserHasCourse;

class UserHasCourseController extends Controller
{
    public function getAll()
    {
        return UserHasCourse::all();
    }

    public function addCourse($user_id, $course_id)
    {
        $userHasCourse = new UserHasCourse();
        $userHasCourse->user_id = $user_id;
        $userHasCourse->course_id = $course_id;
        $userHasCourse->save();
    }

    public function getCourse($user_id)
    {
        $course = UserHasCourse::where('user_id', $user_id)->get()->first();
        if (!$course) {
            return '';
        }
        $course = Course::find($course->course_id);
        return $course->name;
    }
}
