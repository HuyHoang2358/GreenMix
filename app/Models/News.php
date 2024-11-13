<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'name',
        'slug',
        'post_id',
        'category_id',
    ];

    /**
     * Get the post that owns the news.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the category that owns the news.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
