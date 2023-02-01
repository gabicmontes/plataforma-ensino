<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create();
        return [
            'name'       => $this->faker->name,
            'phone'      => $this->faker->phoneNumber,
            'birth_date' => $this->faker->date(),
            'user_id'    => $user->id
        ];
    }
}
