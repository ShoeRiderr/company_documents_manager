<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'NIP' => $this->faker->numberBetween(1000000000),
            'street' => $this->faker->streetName(),
            'build_num' => $this->faker->buildingNumber(),
            'apart_num' => $this->faker->buildingNumber(),
            'post_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
        ];
    }
}
