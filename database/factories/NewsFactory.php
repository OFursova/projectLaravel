<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        return [
            'title' => $this->faker->words(2, true),
            'short_content' => $this->faker->paragraphs(1, true),
            'content' => $this->faker->paragraphs(4, true),
            'img' => $this->faker->image(`$root/public/images`, 300, 200, null, false),
            'user_id' => User::factory(),
            'slug' => $this->faker->slug(),
        ];
    }
}
