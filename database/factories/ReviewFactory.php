<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;
use \App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'book_id' => $this->faker->randomElement(Book::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'content' => $this->faker->sentence(),
            'rating' => round($this->faker->randomNumber(1) / 5)
        ];
    }
}
