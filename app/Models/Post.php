<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static find($post_id)
 * @method static findOrFail($post_id)
 * @method static where(string $string, mixed $type_id)
 */
class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'name',
        'title',
        'slug',
        'description',
        'type_id',
        'content',
        'images',
        'seo_keyword',
        'seo_title',
        'seo_description',
        'viewer'
    ];
}
