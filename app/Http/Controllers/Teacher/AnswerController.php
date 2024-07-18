<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Exam;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $course = new UserHasCourseController;
        $course_id = $course->getCourseId(auth()->user()->id);
        $exams = Exam::where('course_id', $course_id)->where('is_open', true)->get();
        dd($exams);
        return view('teacher.answer.index', ['exams' => $exams]);
    }

    public function showExam($id)
    {
        $course = new UserHasCourseController;
        $course_id = $course->getCourseId(auth()->user()->id);
        $exam = Exam::where('course_id', $course_id)->get();
        $answers = collect();
        foreach ($exam as $id) {
            $answer = Answer::where('exam_id', $id->id)->get();
            $answers = $answers->merge($answer);
        }
        $answer->sortByDesc('created_at');
        return view('teacher.answer.index', ['answers' => $answers]);
    }

    public function show($id)
    {
        $answer = Answer::find($id);
        $exam = Exam::find($answer->exam_id);
        return view('teacher.answer.show', ['answer' => $answer, 'exam' => $exam]);
    }
}
