<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use \App\Models\Author;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->unsignedBigInteger('author_id');
            $table->foreignIdFor(Author::class);
            // $table->foreignId('author_id');
            // $table->foreign('author_id')
            //     ->references('id')
            //     ->on('authors')
            //     ->onDelete('cascade');
            // $table->foreignIdFor(Author::class);
            $table->timestamp('publication_year');
            $table->string('description');
            $table->string('pdf_link');
            $table->timestamps();
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
