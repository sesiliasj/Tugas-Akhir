<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'user_id' => 2,
            'is_open' => true,
        ]);
    }
}
