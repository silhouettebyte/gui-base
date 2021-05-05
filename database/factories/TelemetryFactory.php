<?php

namespace Database\Factories;

use App\Models\Telemetry;
use Illuminate\Database\Eloquent\Factories\Factory;

class TelemetryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Telemetry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
			'bpm' => $this->faker->randomFloat(2, 40, 120),
			'spo2' => $this->faker->randomFloat(2, 10, 100),
			'temperature' => $this->faker->randomFloat(2, 15, 100),
        ];
    }
}
