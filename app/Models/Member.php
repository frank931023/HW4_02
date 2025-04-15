<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;
    protected $table = "members";

    protected $fillable = ["name", "email","password"];

    // A member has many pages
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    // A member has many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // A member has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
