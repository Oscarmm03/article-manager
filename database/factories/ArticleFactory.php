<?php

namespace Database\Factories;
use App\Models\Article;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;
  
    public function definition()
    {
        return [
            'id'=>$this->faker->int(),
            'user_id' => User::factory(),
            'name' => $this->faker->word,
            'price' => $this->faker->randomNumber(2),
            'quantity' => $this->faker->numberBetween(50, 500),
            'status' => $this->faker->boolean()
        ];
    }
}
