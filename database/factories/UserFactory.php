<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = Faker::create();

        return [
            'id' => null,
            'name' => $faker->name,
            'email' => $faker->safeEmail,
            'email_verified_at' => time(),
            'password' =>
                '$2y$10$9oFQ1uL6JLgn.39dAVuAxuMMBJPDrn./ap64k11KZutKj2zLbLUJm',
            'remember_token' => Str::random(),
            'created_at' => time(),
            'updated_at' => time(),
        ];
    }
}
