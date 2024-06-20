<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreAnswerRequest;
use App\Models\Answer;
use App\Models\Exam;
use GuzzleHttp\Psr7\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = $this->getActiveExam();
        return view('student.exam.index', ['exams' => $exams]);
    }

    public function answer($id)
    {
        $exam = Exam::find($id);
        return view('student.exam.answer', ['exam' => $exam]);
    }

    public function storeAnswer($id, StoreAnswerRequest $request)
    {
        $validated = $request->validated();
        $validated['exam_id'] = $id;
        $validated['student_id'] = auth()->user()->id;
        $validated['score'] = 0;
        Answer::create($validated);

        return redirect()->route('student.exam.index');
    }

    public function getActiveExam()
    {
        $course = new UserHasCourseController;
        $course_id = $course->getCourseId(auth()->user()->id);

        $exams = collect();
        foreach ($course_id as $id) {
            $exam = Exam::where('course_id', $id)->where('is_open', true)->get();
            $exams = $exams->merge($exam);
        }
        return $exams;
    }
}
