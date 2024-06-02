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
        $course = UserHasCourse::where('user_id', $user_id)->get()->pluck('course_id');

        if ($course->isEmpty()) {
            return '';
        }

        if (count($course) > 1) {
            $courses = Course::whereIn('id', $course)->get();
            $courseName = '';
            foreach ($courses as $course) {
                $courseName .= $course->name . ', ';
            }
            return rtrim($courseName, ', ');
        }

        $course = Course::find($course->first());
        return $course->name;
    }
}
