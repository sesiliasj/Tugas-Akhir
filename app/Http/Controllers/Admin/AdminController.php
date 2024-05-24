<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $teachers = User::role('teacher')->get();
        $teacher = $teachers->count();
        return view('admin.dashboard', ['teacher' => $teacher, 'type_menu' => 'dashboard']);
    }
}
