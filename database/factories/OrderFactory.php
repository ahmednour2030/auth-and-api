<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $student = Student::first();

        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text,
            'student_id' => $student['id'],
            'school_id' => $student['school_id'],
        ];
    }
}
