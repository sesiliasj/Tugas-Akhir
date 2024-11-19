<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCourseRequest;
use App\Http\Requests\Admin\UpdateCourseRequest;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('admin.course.index', ['courses' => $courses]);
    }

    public function create()
    {
        return view('admin.course.create');
    }

    public function store(StoreCourseRequest $request)
    {
        $validated = $request->validated();

        $course = new Course;
        $course->fill($validated);
        $course->save();

        return redirect()->route('admin.course.index');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view('admin.course.edit', ['course' => $course]);
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        $validated = $request->validated();

        $course = Course::findOrFail($id);
        $course->fill($validated);
        $course->save();

        return redirect()->route('admin.course.index');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.course.index');
    }
}
