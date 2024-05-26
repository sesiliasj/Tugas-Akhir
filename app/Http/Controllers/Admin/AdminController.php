<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $teachers = User::role('teacher')->get();
        $teacher = $teachers->count();
        $students = User::role('student')->get();
        $student = $students->count();
        $course = Course::count();

        return view('admin.dashboard', ['teacher' => $teacher, 'student' => $student, 'course' => $course]);
    }
}
