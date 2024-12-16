<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail($id)
 * @method static create(array $array)
 * @method static where(string $string, $slug)
 */
class Project extends Model
{
    use HasFactory;

    protected $table="project";
    public static function boot(): void
    {
        parent::boot();
        static::deleting(function($product){
            $product->post()->delete();
        });
    }

    protected $fillable = [
        'name',
        'address',
        'image',
        'order',
        'slug',
        'post_id'
    ];

    public function post(): BelongsTo
    {

        return $this->belongsTo(Post::class, 'post_id');

    }

}

