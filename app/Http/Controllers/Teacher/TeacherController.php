<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Exam;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $userHasCourseController = new UserHasCourseController();
        $course_id = $userHasCourseController->getCourseId(auth()->user()->id);
        $exam = Exam::where('course_id', $course_id)->get()->count();
        return view('teacher.dashboard', ['exam' => $exam]);
    }
}
