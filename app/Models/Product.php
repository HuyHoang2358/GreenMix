<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail($id)
 * @method static where(string $string, $slug)
 */
class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    public static function boot(): void
    {
        parent::boot();
        static::deleting(function($product){
            $product->post()->delete();
        });
    }

    protected $fillable = [
        'name',
        'slug',
        'images',
        'description',
        'post_id',
        'field_id'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // Mối quan hệ với bảng Field
    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class, 'field_id');
    }
}
