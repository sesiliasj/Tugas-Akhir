<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTeacherRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::role('teacher')->get();

        return view('admin.teacher.index', ['teachers' => $teachers]);
    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        $validated = $request->validated();
        $teacher = new User();
        $teacher->name = $validated['name'];
        $teacher->email = $validated['email'];
        $teacher->password = bcrypt($validated['password']);
        $teacher->assignRole('teacher');
        $teacher->save();

        return redirect()->route('admin.teacher.index');
    }

    public function edit($id)
    {
        $teacher = User::findOrFail($id);

        return view('admin.teacher.edit', ['teacher' => $teacher]);
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

        return redirect()->route('admin.teacher.index');
    }

    public function destroy($id)
    {
        $teacher = User::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teacher.index');
    }
}
