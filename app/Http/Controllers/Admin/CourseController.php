<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index', ['courses' => $courses, 'type_menu' => 'course']);
    }

    public function create()
    {
        return view('admin.course.create', ['type_menu' => 'course']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();

        return redirect()->route('admin.courses.index');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.course.edit', ['course' => $course, 'type_menu' => 'course']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $course = Course::findOrFail($id);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();

        return redirect()->route('admin.courses.index');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses.index');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.course.show', ['course' => $course, 'type_menu' => 'course']);
    }
}
