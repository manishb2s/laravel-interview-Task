<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = Faker::create();

        $posts = Post::all()
            ->pluck('id')
            ->toArray();
        $users = User::all()
            ->pluck('id')
            ->toArray();

        return [
            'id' => null,
            'body' => $faker->realText(1000),
            'post_id' => $faker->randomElement($posts),
            'user_id' => $faker->randomElement($users),
            'created_at' => time(),
            'updated_at' => time(),
        ];
    }
}
