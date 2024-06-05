<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exam::create([
            'course_id' => 1,
            'name' => 'Ujian Akhir Semester',
            'user_id' => 4,
            'is_open' => true,
        ]);
        Exam::create([
            'course_id' => 1,
            'name' => 'Ujian Tengah Semester',
            'user_id' => 4,
            'is_open' => true,
        ]);
        Exam::create([
            'course_id' => 2,
            'name' => 'Ujian Akhir Semester asd',
            'user_id' => 5,
            'is_open' => true,
        ]);
    }
}
