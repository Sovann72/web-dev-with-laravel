<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $fillable = [
        'title',
        'author_id',
        'publication_year',
        'description',
        'pdf_link',
    ];

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class, );
    }
}
