<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Student\ExamController as StudentExamController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\AnswerController as TeacherAnswerController;
use App\Http\Controllers\Teacher\ExamController as TeacherExamController;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Include_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

include 'template.php';

/** @var \App\Models\User */

// Route::redirect('/', '/dashboard-general-dashboard');

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->hasRole('teacher')) {
            return redirect()->route('teacher.dashboard');
        }
        if (Auth::user()->hasRole('student')) {
            return redirect()->route('student.dashboard');
        }
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
    })->name('dashboard');
    Route::middleware('auth')->group(function () {
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
    Route::middleware('role:admin,web')->group(function () {
        Route::prefix('admin')->name('admin')->group(function () {
            Route::get('/', [AdminController::class, 'dashboard'])->name('.dashboard');
            Route::prefix('/course')->name('.course')->group(function () {
                Route::get('/', [CourseController::class, 'index'])->name('.index');
                Route::get('/create', [CourseController::class, 'create'])->name('.create');
                Route::post('/create', [CourseController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('.edit');
                Route::post('/edit/{id}', [CourseController::class, 'update'])->name('.update');
                Route::get('/delete/{id}', [CourseController::class, 'destroy'])->name('.delete');
            });
            Route::prefix('/teacher')->name('.teacher')->group(function () {
                Route::get('/', [AdminTeacherController::class, 'index'])->name('.index');
                Route::get('/create', [AdminTeacherController::class, 'create'])->name('.create');
                Route::post('/create', [AdminTeacherController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [AdminTeacherController::class, 'edit'])->name('.edit');
                Route::post('/edit/{id}', [AdminTeacherController::class, 'update'])->name('.update');
                Route::get('/delete/{id}', [AdminTeacherController::class, 'destroy'])->name('.delete');
                Route::get('/assign-course/{id}', [AdminTeacherController::class, 'assignCourse'])->name('.assign-course');
                Route::post('/assign-course/{id}', [AdminTeacherController::class, 'addCourse'])->name('.add-course');
            });
            Route::prefix('/student')->name('.student')->group(function () {
                Route::get('/', [AdminStudentController::class, 'index'])->name('.index');
                Route::get('/create', [AdminStudentController::class, 'create'])->name('.create');
                Route::post('/create', [AdminStudentController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [AdminStudentController::class, 'edit'])->name('.edit');
                Route::post('/edit/{id}', [AdminStudentController::class, 'update'])->name('.update');
                Route::get('/delete/{id}', [AdminStudentController::class, 'destroy'])->name('.delete');
                Route::get('/assign-course/{id}', [AdminStudentController::class, 'assignCourse'])->name('.assign-course');
                Route::post('/assign-course/{id}', [AdminStudentController::class, 'addCourse'])->name('.add-course');
            });
        });
    });
    Route::middleware('role:student,web')->group(function () {
        Route::prefix('student')->name('student')->group(function () {
            Route::get('/', [StudentController::class, 'dashboard'])->name('.dashboard');
            Route::prefix('/exam')->name('.exam')->group(function () {
                Route::get('/', [StudentExamController::class, 'index'])->name('.index');
                Route::get('/show/{id}', [StudentExamController::class, 'show'])->name('.show');
                Route::get('/answer/{id}', [StudentExamController::class, 'answer'])->name('.answer');
                Route::post('/answer/{id}', [StudentExamController::class, 'storeAnswer'])->name('.answer.store');
            });
        });
    });
    Route::middleware('role:teacher,web')->group(function () {
        Route::prefix('teacher')->name('teacher')->group(function () {
            Route::get('/', [TeacherController::class, 'dashboard'])->name('.dashboard');
            Route::prefix('/exam')->name('.exam')->group(function () {
                Route::get('/', [TeacherExamController::class, 'index'])->name('.index');
                Route::get('/create', [TeacherExamController::class, 'create'])->name('.create');
                Route::post('/create', [TeacherExamController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [TeacherExamController::class, 'edit'])->name('.edit');
                Route::post('/edit/{id}', [TeacherExamController::class, 'update'])->name('.update');
                Route::get('/delete/{id}', [TeacherExamController::class, 'destroy'])->name('.delete');
                Route::post('/open/{id}', [TeacherExamController::class, 'open'])->name('.open');
                Route::post('/close/{id}', [TeacherExamController::class, 'close'])->name('.close');
            });
            Route::prefix('/answer')->name('.answer')->group(function () {
                Route::get('/', [TeacherAnswerController::class, 'index'])->name('.index');
                Route::get('/{id}', [TeacherAnswerController::class, 'show'])->name('.show');
            });
        });
    });
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});
