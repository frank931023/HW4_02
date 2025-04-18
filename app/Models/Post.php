<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $table = "posts";

    protected $fillable = ["title"];

    // Posts belongs to a page
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    // Posts belongs to an user.(one for poster, one for mvp_talker.)
    public function poster()
    {
        return $this->belongsTo(User::class, 'poster_id');
    }

    // A post has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
