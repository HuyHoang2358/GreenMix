<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static find($id)
 */
class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'detail',
        'iframe',
        'order',
        'is_show',
    ];
}
