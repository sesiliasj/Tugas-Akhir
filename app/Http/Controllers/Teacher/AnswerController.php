<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Exam;
use App\Models\User;
use App\Models\UserHasCourse;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

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

    public function show($id, $studentId)
    {
        $exam = Exam::find($id);
        $examcontents = $exam->contents;
        $answers = collect();
        $count = $examcontents->count();
        $score = collect();
        $totalweightscore = 0;
        $totalscore = 0;
        foreach ($examcontents as $index => $content) {
            $answer = Answer::where('examcontent_id', $content->id)->where('student_id', $studentId)->get();
            if ($answer[0]->score == null) {
                $answer[0]->score = $this->gpt($answer[0]->answer);
                $answer[0]->score = (int) filter_var($answer[0]->score, FILTER_SANITIZE_NUMBER_INT);
                $answer[0]->save();
            }
            foreach ($answer as $ans) {
                if ($ans->score >= 55) {
                    $score[$index] = 100 / $count / 2;
                    $totalweightscore += 100 / $count / 2;
                } else {
                    $score[$index] = 100 / $count;
                    $totalweightscore += 100 / $count;
                }
            }
            $answers = $answers->merge($answer);
        }
        return view('teacher.answer.show', ['answers' => $answers, 'examcontents' => $examcontents, 'exam' => $exam, 'score' => $score, 'totalweightscore' => $totalweightscore, 'totalscore' => $totalscore]);
    }

    public function print($id, $studentId)
    {
        $student = User::find($studentId);
        $exam = Exam::find($id);
        $course = Course::find($exam->course_id);
        $examcontents = $exam->contents;
        $answers = collect();
        $count = $examcontents->count();
        $score = collect();
        $totalweightscore = 0;
        $totalscore = 0;
        foreach ($examcontents as $index => $content) {
            $answer = Answer::where('examcontent_id', $content->id)->where('student_id', $studentId)->get();
            if ($answer[0]->score == null) {
                $answer[0]->score = $this->gpt($answer[0]->answer);
                $answer[0]->score = (int) filter_var($answer[0]->score, FILTER_SANITIZE_NUMBER_INT);
                $answer[0]->save();
            }
            foreach ($answer as $ans) {
                if ($ans->score >= 55) {
                    $score[$index] = 100 / $count / 2;
                    $totalweightscore += 100 / $count / 2;
                } else {
                    $score[$index] = 100 / $count;
                    $totalweightscore += 100 / $count;
                }
                if ($totalscore == 0) {
                    $totalscore = $ans->score;
                } else {
                    $totalscore = ($totalscore + $ans->score) / 2;
                }
            }
            $answers = $answers->merge($answer);
        }

        $data = [
            'exam' => $exam,
            'examcontents' => $examcontents,
            'answers' => $answers,
            'student' => $student,
            'course' => $course,
            'score' => $score,
            'totalweightscore' => $totalweightscore,
            'totalscore' => $totalscore,
        ];

        $pdf = Pdf::loadView('teacher.answer.print', $data);

        $file_name = $student->name . '_' . $exam->name . '.pdf';

        return $pdf->download($file_name);
    }

    public function gpt($text)
    {
        $url = env('API_GPT');

        $text = $this->removeHtmlTagsAndNewlines($text);
        if (! $url) {
            return response()->json(['error' => 'API_GPT URL is not configured in .env'], 500);
        }
        $response = Http::post($url, [
            'text' => $text,
        ]);

        if ($response->successful()) {
            return $response->json('AI');
        }

        return response()->json([
            'error' => 'Failed to send to API_GPT',
            'details' => $response->json(),
        ], $response->status());
    }

    function removeHtmlTagsAndNewlines($text)
    {
        $textWithoutHtml = strip_tags($text);
        $textWithoutNewlines = preg_replace('/\s+/', ' ', $textWithoutHtml);
        return $textWithoutNewlines;
    }
}
