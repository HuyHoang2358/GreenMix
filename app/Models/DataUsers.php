<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail(mixed $input)
 */
class DataUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'company',
        'phone',
        'content',
        'status',
    ];
}
