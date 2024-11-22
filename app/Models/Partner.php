<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static orderBy(string $string, string $string1)
 * @method static request()
 * @method static create(array $array)
 * @method static findOrFail(mixed $input)
 */
class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'url',
        'order'
    ];
}
