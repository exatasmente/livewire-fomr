<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'line_1' => $this->faker->address,
            'line_2' => $this->faker->secondaryAddress,
            'city' =>  $this->faker->city,
            'state' => $this->faker->state,
            'neighborhood' => $this->faker->name,
            'number'=> $this->faker->numerify('###'),
            'zipcode' => $this->faker->numerify('########'),
        ];
    }
}
