<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $student = Student::whereDoesntHave('courses')->first();

        if (empty($student)) {
            return;
        }

        return [
            'student_id' => $student->id,
            'course_id'  => Course::all()->random()->id
        ];
    }
}
