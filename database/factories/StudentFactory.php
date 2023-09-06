<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'name'=>$this->faker->name,
                'age'=>$this->faker->numberBetween($min = 2, $max = 18),
                'gender'=>$this->faker->randomElement($array = array ('female','male')),
                'email'=>$this->faker->safeEmail,
                'phone'=>$this->faker->phoneNumber,
                'address'=>$this->faker->address,
                'class'=>$this->faker->text($maxNbChars = 10),
                'created_at'=>$this->faker->dateTime(),
                'updated_at'=>$this->faker->dateTime(),
        ];
    }
}
