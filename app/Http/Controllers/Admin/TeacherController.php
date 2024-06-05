<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTeacherRequest;
use App\Http\Requests\Admin\UpdateTeacherRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::role('teacher')->get();
        $getCourse = new UserHasCourseController();
        $course = [];

        foreach ($teachers as $teacher) {
            $course[$teacher->id] = $getCourse->getCourse($teacher->id);
        }

        return view('admin.teacher.index', ['teachers' => $teachers, 'course' => $course]);
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

    public function update(UpdateTeacherRequest $request, $id)
    {
        $validated = $request->validated();

        $teacher = User::findOrFail($id);
        $teacher->name = $validated['name'];
        $teacher->email = $validated['email'];
        $teacher->save();

        return redirect()->route('admin.teacher.index');
    }

    public function destroy($id)
    {
        $teacher = User::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teacher.index');
    }

    public function assignCourse($id)
    {
        $teacher = User::findOrFail($id);
        $courses = Course::all();

        return view('admin.teacher.assign-course', ['teacher' => $teacher, 'courses' => $courses]);
    }

    public function addCourse($id, Request $request)
    {
        $course_id = $request->course_id;
        $userHasCourse = new UserHasCourseController();
        $userHasCourse->addCourse($id, $course_id);

        return redirect()->route('admin.teacher.index');
    }
}
