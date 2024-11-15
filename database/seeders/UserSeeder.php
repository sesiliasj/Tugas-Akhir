<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserHasCourse;
use Egulias\EmailValidator\Result\Reason\SpoofEmail;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = User::create([
            'name' => 'student',
            'email' => 'student@zeroplag.id',
            'password' => bcrypt('student'),
        ]);
        $student->assignRole('student');
        UserHasCourse::create([
            'user_id' => $student->id,
            'course_id' => 1,
        ]);
        UserHasCourse::create([
            'user_id' => $student->id,
            'course_id' => 2,
        ]);

        $student = User::create([
            'name' => 'student2',
            'email' => 'student2@zeroplag.id',
            'password' => bcrypt('student'),
        ]);
        $student->assignRole('student');
        UserHasCourse::create([
            'user_id' => $student->id,
            'course_id' => 1,
        ]);
        UserHasCourse::create([
            'user_id' => $student->id,
            'course_id' => 2,
        ]);

        $teacher = User::create([
            'name' => 'teacher',
            'email' => 'teacher@zeroplag.id',
            'password' => bcrypt('teacher'),
        ]);
        $teacher->assignRole('teacher');
        UserHasCourse::create([
            'user_id' => $teacher->id,
            'course_id' => 1,
        ]);

        $teacher = User::create([
            'name' => 'teacher2',
            'email' => 'teacher2@zeroplag.id',
            'password' => bcrypt('teacher'),
        ]);
        $teacher->assignRole('teacher');
        UserHasCourse::create([
            'user_id' => $teacher->id,
            'course_id' => 2,
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@zeroplag.id',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole('admin');
    }
}
