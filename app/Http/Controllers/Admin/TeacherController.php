<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::role('teacher')->get();
        return view('admin.teacher.index', ['teachers' => $teachers, 'type_menu' => 'teacher']);
    }

    public function create()
    {
        return view('admin.teacher.create', ['type_menu' => 'teacher']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);
        $teacher->assignRole('teacher');
        $teacher->save();

        return redirect()->route('admin.teachers.index');
    }

    public function edit($id)
    {
        $teacher = User::findOrFail($id);
        return view('admin.teacher.edit', ['teacher' => $teacher, 'type_menu' => 'teacher']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $teacher = User::findOrFail($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->save();

        return redirect()->route('admin.teachers.index');
    }

    public function destroy($id)
    {
        $teacher = User::findOrFail($id);
        $teacher->delete();
        return redirect()->route('admin.teachers.index');
    }
}
