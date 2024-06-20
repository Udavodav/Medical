<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\ServiceDoctor;
use App\Models\Write;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Write>
 */
class WriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Write::class;

    public function definition(): array
    {
        $doctor = Doctor::has('services')->get()->random()->id;
        return [
            'date_write' => fake()->dateTimeBetween('now', '+3 days')->format('Y-m-d'),
            'time_write' => fake()->numberBetween(480, 1000),
            'client_id' => Client::get()->random()->id,
            'doctor_id' => $doctor,
            'service_id' => ServiceDoctor::where('doctor_id', $doctor)->get()->random()->service_id,
        ];
    }
}
