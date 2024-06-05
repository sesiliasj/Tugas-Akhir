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
            ['name' => 'Pemrograman Dasar'],
            ['name' => 'Algoritma dan Struktur Data'],
            ['name' => 'Desain Pengalaman Pengguna'],
            ['name' => 'Pemrograman Web'],
            ['name' => 'Pemrograman Berorientasi Objek'],
            ['name' => 'Workshop Pemrograman Perangkat Bergerak'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
