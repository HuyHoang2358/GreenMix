<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail($id)
 * @method static where(string $string, int $int)
 */
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
    public static function boot(): void
    {
        // Trước khi xóa 1 category sẽ xóa các category con
        parent::boot();
        static::deleting(function($news){
            $news->post->delete();
        });
    }

    /**
     * Get the post that owns the news.
     */
    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the category that owns the news.
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
