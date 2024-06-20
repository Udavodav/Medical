<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CommentsDoctor;
use App\Models\Competence;
use App\Models\Doctor;
use App\Models\Role;
use App\Models\Service;
use App\Models\ServiceDoctor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Write;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::insert([['title' => 'admin'],
                    ['title' => 'doctor'],
                    ['title' => 'client']]);

        User::factory()->create(['role_id' => 1, 'email' => 'admin@admin']);

        Competence::factory()->count(10)->create();

        User::factory()
            ->count(5)
            ->hasDoctor(1)
            ->create(['role_id' => 2]);

        User::factory()
            ->count(5)
            ->hasClient(1)
            ->create(['role_id' => 3]);

        Category::factory()
            ->count(10)
            ->has(Service::factory()->count(5))
            ->create();

        $doctors = Doctor::all();
        $services = Service::all();

        foreach ($doctors as $doctor) {
            $doctor->services()->attach(
                $services->random(5)->pluck('id')
            );
        }

        CommentsDoctor::factory()->count(10)->create();

        Write::factory()->count(20)->create();


    }
}
