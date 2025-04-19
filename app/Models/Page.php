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

    protected $casts = [
        'tags' => 'array', // tags 自動轉陣列
    ];

    // Pages belong to a user.(one for creator)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A page has many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
