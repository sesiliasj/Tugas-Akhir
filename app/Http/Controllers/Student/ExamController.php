<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Examcontent;
use Illuminate\Http\Request;

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

    public function storeAnswer($id, Request $request)
    {
        $exam = Exam::with('contents')->findOrFail($id);

        foreach ($exam->contents as $index => $content) {
            Answer::create([
                'examcontent_id' => $content->id,
                'student_id' => auth()->user()->id,
                'answer' => $request->answer[$index] ?? '',
                'score' => 0
            ]);
        }

        return redirect()->route('student.exam.index');
    }

    public function getActiveExam()
    {
        $course = new UserHasCourseController;
        $course_id = $course->getCourseId(auth()->user()->id);

        $exams = collect();
        foreach ($course_id as $id) {
            $exam = Exam::where('course_id', $id)->where('is_open', true)->get();
            $exam = $exam->map(function ($exam) {
                $exam->status = 1;
                return $exam;
            });
            $examcontent = Examcontent::whereIn('exam_id', $exam->pluck('id')->toArray())->get();
            $answer = Answer::where('student_id', auth()->id())->where('examcontent_id', $examcontent->pluck('id')->toArray())->get();
            if ($answer->count() > 0) {
                $exam = $exam->map(function ($exam) use ($answer) {
                    $exam->status = 0;
                    return $exam;
                });
            }
            $exams = $exams->merge($exam);
        }
        return $exams;
    }
}
