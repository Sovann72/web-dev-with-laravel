<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Model implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // public function books() {
    //     return $this->hasMany(Book::class);
    // }

    protected $fillable = ['username', 'email', 'password', 'role'];

    public function author() {
        return $this->hasOne(User::class, "user_id", "id");
    }

    // public function reviews() {
    //     return $this->hasMany(Review::class);
    // }
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName() {

    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {

    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {

    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken() {

    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value) {

    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName() {
        
    }
}
