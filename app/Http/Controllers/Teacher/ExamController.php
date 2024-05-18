<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreExamRequest;
use App\Models\Exam;
use Illuminate\Auth\Events\Validated;

class ExamController extends Controller
{
    public function index()
    {
        return view('teacher.exam.index', ['type_menu' => 'exam']);
    }

    public function create()
    {
        return view('teacher.exam.create', ['type_menu' => 'exam']);
    }

    public function store(StoreExamRequest $request)
    {
        $validated = $request->validated();
        Exam::create($validated);
        return redirect()->route('teacher.exam.index');
    }

    public function edit($id)
    {
        return view('teacher.exam.edit', ['type_menu' => 'exam', 'id' => $id]);
    }
}
