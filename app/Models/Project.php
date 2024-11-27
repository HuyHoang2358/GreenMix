<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static findOrFail($id)
 */
class Project extends Model
{
    use HasFactory;

    protected $table="project";

    protected $fillable = [
        'name',
        'address',
        'image',
        'order'
    ];

}
