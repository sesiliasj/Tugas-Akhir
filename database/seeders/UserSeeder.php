<?php

namespace Database\Seeders;

use App\Models\User;
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
        $teacher = User::create([
            'name' => 'teacher',
            'email' => 'teacher@zeroplag.id',
            'password' => bcrypt('teacher'),
        ]);
        $teacher->assignRole('teacher');
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@zeroplag.id',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole('admin');
    }
}
