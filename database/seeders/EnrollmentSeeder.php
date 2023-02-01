<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();

        foreach ($students as $student) {
            $courses = Course::all()->random(3);
            foreach ($courses as $course) {
                Enrollment::create([
                    'student_id' => $student->id,
                    'course_id'  => $course->id
                ]);
            }
        }
    }
}
