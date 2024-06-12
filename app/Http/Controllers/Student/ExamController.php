<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;


class ExamController extends Controller
{
    public function index()
    {
        $exams = $this->getActiveExam();
        return view('student.exam.index', ['exams' => $exams]);
    }

    public function getActiveExam()
    {
        $course = new UserHasCourseController;
        $course_id = $course->getCourseId(auth()->user()->id);

        $exams = collect();
        foreach ($course_id as $id) {
            $exam = Exam::where('course_id', $id)->where('is_open', true)->get();
            $exams = $exams->merge($exam);
        }
        return $exams;
    }
}
