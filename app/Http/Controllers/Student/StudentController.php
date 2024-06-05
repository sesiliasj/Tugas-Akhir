<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;

class StudentController extends Controller
{
    public function dashboard()
    {
        $course = new UserHasCourseController;
        $course_id = $course->getCourseId(auth()->user()->id);

        $exams = collect();
        foreach ($course_id as $id) {
            $exam = Exam::where('course_id', $id)->get();
            $exams = $exams->merge($exam);
        }

        $count = $exams->count();
        return view('student.dashboard', ['exam' => $count]);
    }
}
