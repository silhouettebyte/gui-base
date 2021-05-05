<?php

namespace Database\Factories;

use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Device::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		return [
			'identifier' => $this->faker->macAddress,
			'status' => $this->faker->randomElement(['ACTIVE', 'INACTIVE', 'IDLE']),
		];
    }
}
