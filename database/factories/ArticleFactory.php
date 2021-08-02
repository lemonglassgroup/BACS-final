<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug'       => $this->faker->unique()->slug(),
            'term'       => $this->faker->unique()->word(),
            'excerpt'    => $this->faker->paragraphs(1, true),
            'definition' => $this->faker->paragraphs(6, true),
        ];
    }
}
