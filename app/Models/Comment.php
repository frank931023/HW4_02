<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $table = "comments";

    protected $fillable = ["text"];

    // A commment belongs to a member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // A comment belongs to a post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
