<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'is_verified', 'user_id']; 

    public function user() {
        return $this->belongsTo(User::class, );
    }

    public function books() {
        return $this->hasMany(Book::class, "author_id", "id");
    }
}
