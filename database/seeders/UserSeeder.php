<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\Author;
use App\Models\Review;


class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		User::factory()
			->count(1)
			->has(
				Author::factory()
				->has(
					Book::factory(50)
					->has(Review::factory(1))
				)
			)
			->create();

		// User::created([
		// 	'username' => 'admin',
		// 	'email' => 'admin@elibrarykh.com',
		// 	'password' => bcrypt('admin'),
		// 	'role' => 'admin',
		// 	'avatar' => 'admin.png',
		// 	'background_image' => 'background_admin.png'
		// ]);

			// User::factory()
			// ->count(5)
			// ->create();

	}
}
