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
        $course_id = $this->getCourseId();
        $exams = Exam::where('course_id', $course_id)->get();

        return view('teacher.answer.index', ['exams' => $exams]);
    }

    public function showAnswer($id)
    {
        $exam = Exam::find($id);
        $students = $this->getStudentsWithAnswers($exam);
        foreach ($students as $student) {
            if ($student->answer->count() > 0) {
                $data = $this->calculateScores($exam, $student->id);
                $student->totalscore = $data['totalscore'];
            } else {
                $student->totalscore = 0;
            }
        }
        return view('teacher.answer.exam', ['students' => $students, 'exam' => $exam]);
    }

    public function showExam($id)
    {
        $course_id = $this->getCourseId();
        $exams = Exam::where('course_id', $course_id)->get();
        $answers = collect();

        foreach ($exams as $exam) {
            $answers = $answers->merge(Answer::where('exam_id', $exam->id)->get());
        }

        $answers = $answers->sortByDesc('created_at');

        return view('teacher.answer.index', ['answers' => $answers]);
    }

    public function show($id, $studentId)
    {
        $exam = Exam::find($id);
        $data = $this->calculateScores($exam, $studentId);

        return view('teacher.answer.show', $data);
    }

    public function print($id, $studentId)
    {
        $student = User::find($studentId);
        $exam = Exam::find($id);
        $course = Course::find($exam->course_id);
        $data = $this->calculateScores($exam, $studentId);

        $data['student'] = $student;
        $data['course'] = $course;

        $pdf = Pdf::loadView('teacher.answer.print', $data);
        $file_name = $student->name . '_' . $exam->name . '.pdf';

        return $pdf->download($file_name);
    }

    private function getCourseId()
    {
        $course = new UserHasCourseController;
        return $course->getCourseId(auth()->user()->id);
    }

    private function getStudentsWithAnswers($exam)
    {
        $course = Course::find($exam->course_id);
        $users = UserHasCourse::where('course_id', $course->id)->get();
        $students = collect();

        foreach ($users as $userCourse) {
            $user = User::find($userCourse->user_id);
            if ($user && $user->hasRole('student')) {
                $user->answer = Answer::where('examcontent_id', $exam->contents[0]->id)
                    ->where('student_id', $user->id)
                    ->get();
                $students->push($user);
            }
        }

        return $students;
    }

    private function calculateScores($exam, $studentId)
    {
        $examcontents = $exam->contents;
        $answers = collect();
        $count = $examcontents->count();
        $score = collect();
        $totalweightscore = 0;
        $totalscore = 0;

        foreach ($examcontents as $index => $content) {
            $answer = Answer::where('examcontent_id', $content->id)
                ->where('student_id', $studentId)
                ->get();

            if ($answer[0]->score == null) {
                $answer[0]->score = $this->gpt($answer[0]->answer);
                $answer[0]->score = (int) filter_var($answer[0]->score, FILTER_SANITIZE_NUMBER_INT);
                $answer[0]->save();
            }

            foreach ($answer as $ans) {
                $score[$index] = $ans->score >= 55 ? 100 / $count / 2 : 100 / $count;
                $totalweightscore += $score[$index];
                $totalscore += $ans->score;
            }

            $answers = $answers->merge($answer);
        }

        $totalscore = $totalscore / $count;

        return [
            'answers' => $answers,
            'examcontents' => $examcontents,
            'exam' => $exam,
            'score' => $score,
            'totalweightscore' => $totalweightscore,
            'totalscore' => $totalscore,
        ];
    }

    public function gpt($text)
    {
        $url = env('API_GPT');
        $text = $this->removeHtmlTagsAndNewlines($text);

        if (!$url) {
            return response()->json(['error' => 'API_GPT URL is not configured in .env'], 500);
        }

        $response = Http::post($url, ['text' => $text]);

        if ($response->successful()) {
            return $response->json('AI');
        }

        return response()->json([
            'error' => 'Failed to send to API_GPT',
            'details' => $response->json(),
        ], $response->status());
    }

    private function removeHtmlTagsAndNewlines($text)
    {
        $textWithoutHtml = strip_tags($text);
        return preg_replace('/\s+/', ' ', $textWithoutHtml);
    }
}
