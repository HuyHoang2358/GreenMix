<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static find($id)
 * @method static create(array $array)
 * @method static findOrFail($id)
 */
class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'attach_link',
        'is_show',
        'path',
        'order',
    ];
}
