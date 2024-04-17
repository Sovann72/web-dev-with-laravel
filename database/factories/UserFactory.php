<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $fillable = ['username', 'email', 'password', 'role', 'avatar', 'background_image'];

    public function definition(): array
    {
        $username = $this->faker->userName();
        $email = $this->faker->safeEmail();
        $password = $this->faker->password();
        $role = "user";
        $avatar = $this->faker->imageUrl(100, 100);
        $background_image = $this->faker->imageUrl(851, 315);

        return [
            'username' => $username,
            'email'=> $email,
            'password'=> $password,
            'role'=> $role,
            'avatar'=> $avatar,
            'background_image' => $background_image
        ];
    }
}
