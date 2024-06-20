<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\CommentsDoctor;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommentsDoctor>
 */
class CommentsDoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = CommentsDoctor::class;

    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'text' => fake()->text(),
            'client_id' =>Client::get()->random()->id,
            'doctor_id' =>Doctor::get()->random()->id,
        ];
    }
}
