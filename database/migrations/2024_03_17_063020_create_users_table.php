<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('avatar')->nullable();
            $table->string('background_image')->nullable(); 
            $table->timestamps();
        });

        // User::created([
		// 	'username' => 'admin',
		// 	'email' => 'admin@elibrarykh.com',
		// 	'password' => bcrypt('admin'),
		// 	'role' => 'admin',
		// 	'avatar' => 'admin.png',
		// 	'background_image' => 'background_admin.png'
		// ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
