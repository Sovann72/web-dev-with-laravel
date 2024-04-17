<?php

namespace Database\Factories;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'author_id' => $this->faker->randomElement(Author::pluck('id')),
            // 'user_id' => User::factory(),
            'publication_year' => $this->faker->dateTimeBetween(),
            'description' => $this->faker->sentence(),
            'pdf_link' => $title.".pdf",
        ];
    }
}
