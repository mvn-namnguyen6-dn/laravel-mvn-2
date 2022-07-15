<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->text(),
            'tel' => $this->faker->phoneNumber(),
            'user_id'=>$this->faker->numberBetween(1,20),
            'province' => $this->faker->text(),


        ];
    }
}
