<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStudentRequest;
use App\Http\Requests\Admin\UpdateStudentRequest;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::role('student')->get();

        return view('admin.student.index', ['students' => $students]);
    }

    public function create()
    {
        return view('admin.student.create');
    }

    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();

        $student = new User();
        $student->name = $validated['name'];
        $student->email = $validated['email'];
        $student->password = bcrypt($validated['password']);
        $student->assignRole('student');
        $student->save();

        return redirect()->route('admin.student.index');
    }

    public function edit($id)
    {
        $student = User::findOrFail($id);

        return view('admin.student.edit', ['student' => $student]);
    }

    public function update(UpdateStudentRequest $request, $id)
    {
        $validated = $request->validated();

        $student = User::findOrFail($id);
        $student->name = $validated['name'];
        $student->email = $validated['email'];
        $student->save();

        return redirect()->route('admin.student.index');
    }

    public function destroy($id)
    {
        $student = User::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.student.index');
    }
}
