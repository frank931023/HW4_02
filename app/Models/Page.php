<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /** @use HasFactory<\Database\Factories\PageFactory> */
    use HasFactory;
    protected $table = "pages";

    protected $fillable = ["title", "post_count"];

    // Pages belong to a member.(one for creator)
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // A page has many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
