<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address_1'     => $this->faker->address,
            'address_2'     => $this->faker->address,
            'postal_code'   => $this->faker->postcode,
            'lat'           => $this->faker->latitude,
            'lng'           => $this->faker->longitude,
            'country_id'    => Country::all()->random()->id,
        ];
    }
}
