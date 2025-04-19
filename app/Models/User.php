<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = "users";

    // protected $fillable = ["name", "email","password"];

    // A user has many pages
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    // A user has many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // A user has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'gender', 'preferences', 'avatar'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'preferences' => 'array',
        ];
    }
}
