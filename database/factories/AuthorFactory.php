<?php

namespace Database\Factories;

use App\Models\Author;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

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
            'uuid' => Str::uuid(),
            'name' => $faker->word,
            'email' => $faker->safeEmail,
            'password' =>
                '$2y$10$0S4cmTYouJzaB7R0sRW93udUAMnnPev/KHHXboj82syjdVRbO203q',
            'created_at' => time(),
            'updated_at' => time(),
        ];
    }
}
