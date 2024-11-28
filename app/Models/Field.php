<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 * @method static findOrFail($id)
 * @method static orderBy(string $string, string $string1)
 */
class Field extends Model
{
    use HasFactory;
    protected  $fillable = [
        'name',
        'slug',
        'images',
        'description',
        'post_id'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // TODO; Handle delete post when delete field
    public static function boot(): void
    {
        // Trước khi xóa 1 field sẽ xóa post mà đính kèm với field
        parent::boot();
        static::deleting(function($field){
            $field->post()->delete();
        });
    }

}
