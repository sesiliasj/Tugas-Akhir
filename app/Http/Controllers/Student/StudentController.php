<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('student.dashboard', ['type_menu' => 'dashboard']);
    }
}
