<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Exam;
use App\Models\User;
use App\Models\UserHasCourse;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class AnswerController extends Controller
{
    public function index()
    {
        $course = new UserHasCourseController;
        $course_id = $course->getCourseId(auth()->user()->id);
        $exams = Exam::where('course_id', $course_id)->get();
        return view('teacher.answer.index', ['exams' => $exams]);
    }

    public function showAnswer($id)
    {
        $exam = Exam::find($id);
        $course = Course::find($exam->course_id);
        $users = UserHasCourse::where('course_id', $course->id)->get();
        $students = collect();

        foreach ($users as $userCourse) {
            $user = User::find($userCourse->user_id);
            if ($user && $user->hasRole('student')) {
                $students->push($user);
            }
        }

        foreach ($students as $student) {
            $answer = Answer::where('examcontent_id', $exam->contents[0]->id)->where('student_id', $student->id)->get();
            $student->answer = $answer;
        }

        return view('teacher.answer.exam', ['students' => $students, 'exam' => $exam]);
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
        $exam = Exam::find($id);
        $examcontents = $exam->contents;
        $answers = collect();
        foreach ($examcontents as $content) {
            $answer = Answer::where('examcontent_id', $content->id)->get();
            $answers = $answers->merge($answer);
        }
        return view('teacher.answer.show', ['answers' => $answers, 'examcontents' => $examcontents, 'exam' => $exam]);
    }
}
