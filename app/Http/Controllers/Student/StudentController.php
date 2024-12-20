<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function dashboard()
    {
        $exams = new ExamController;
        $exams = $exams->getActiveExam();
        $count = $exams->count();

        return view('student.dashboard', ['exam' => $count]);
    }
}
