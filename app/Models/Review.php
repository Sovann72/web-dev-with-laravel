<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'user_id', 'content', 'rating'];

    public function user() {
        return $this->hasOne(User::class);
    }

    public function book() {
        return $this->hasOne(Book::class);
    }
}
