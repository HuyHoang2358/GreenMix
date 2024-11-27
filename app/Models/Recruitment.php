<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 */
class Recruitment extends Model
{
    use HasFactory;

    protected $table = 'recruitment';

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'category_id',
        'address',
        'num_people',
        'description',
        'requirements',
        'benefit',
    ];

    public function category(){

        return $this->belongsTo(Category::class, 'category_id');

    }

}
