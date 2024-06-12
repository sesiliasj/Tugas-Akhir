<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreExamRequest;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index()
    {
        $userHasCourseController = new UserHasCourseController();
        $course_id = $userHasCourseController->getCourseId(auth()->user()->id);
        $exams = Exam::where('course_id', $course_id)->get();

        return view('teacher.exam.index', ['exams' => $exams]);
    }

    public function create()
    {
        $userHasCourseController = new UserHasCourseController();
        $course_id = $userHasCourseController->getCourseId(auth()->user()->id);
        $user_id = auth()->user()->id;
        return view('teacher.exam.create', ['course_id' => $course_id, 'user_id' => $user_id]);
    }

    public function store(StoreExamRequest $request)
    {
        $validated = $request->validated();
        Exam::create($validated);

        return redirect()->route('teacher.exam.index');
    }

    public function edit($id)
    {
        return view('teacher.exam.edit', ['id' => $id]);
    }

    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect()->route('teacher.exam.index');
    }

    public function open($id)
    {
        $exam = Exam::find($id);
        $exam->is_open = true;
        $exam->save();

        return redirect()->route('teacher.exam.index');
    }

    public function close($id)
    {
        $exam = Exam::find($id);
        $exam->is_open = false;
        $exam->save();

        return redirect()->route('teacher.exam.index');
    }
}
