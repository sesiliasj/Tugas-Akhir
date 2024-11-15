<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            ['name' => 'Etika Profesi'],
            ['name' => 'Manajemen Proyek'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
